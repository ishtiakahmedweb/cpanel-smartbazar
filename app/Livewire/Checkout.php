<?php

namespace App\Livewire;

use App\Http\Resources\ProductResource;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\User\AccountCreated;
use App\Notifications\User\OrderPlaced;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function Illuminate\Support\defer;

class Checkout extends Component
{
    // public $order = null; // Removed to prevent Livewire serialization issues with transaction result

    public $isFreeDelivery = false;

    public $name = '';

    public $phone = '';

    public $shipping = '';

    public $address = '';

    public $note = '';

    public $city_id = '';

    public $area_id = '';

    public array $cityAreas = [];

    protected $listeners = ['updateField'];

    public array $retail = [];

    public $retailDeliveryFee = 0;

    #[Validate('required|numeric|min:0')]
    public $advanced = 0;

    #[Validate('nullable|numeric|min:0')]
    public $retailDiscount = 0;

    public $coupon_code = '';

    public $applied_coupon = null;

    public $coupon_discount = 0;

    /**
     */
    public bool $retailDeliveryFeeManuallySet = false;

    public function hydrate(): void
    {
        if (app()->environment('local') && request()->has('calls')) {
            logger()->debug('Checkout Livewire call queue', [
                'calls' => request()->input('calls'),
                'updates' => request()->input('updates'),
            ]);
        }
    }

    public function updateField($field, $value): void
    {
        if ($field === 'retail' && is_array($value)) {
            // Merge the retail array to preserve existing values
            $this->retail = array_merge($this->retail, $value);
        } else {
            $this->$field = $value;
            longCookie($field, $value);
        }

        // I don't know how, but it works.
        $this->updatedShipping();
    }

    public function updatedCityId($value): void
    {
        // Guard against empty values
        if (!$value) {
            $this->area_id = '';
            $this->cityAreas = [];
            $this->retailDeliveryFee = 0;
            return;
        }

        // Store the value and save to cookie
        $this->city_id = $value;
        longCookie('city_id', $value);

        // Reset area selection
        $this->area_id = '';
        longCookie('area_id', '');
        
        // Load areas for selected city
        $this->cityAreas = Area::where('district_id', $value)->orderBy('name', 'asc')->get()->toArray();

        // Determine shipping zone and fee
        $city = District::find($value);
        if ($city) {
            $cityName = strtolower(trim($city->name));
            if (str_contains($cityName, 'dhaka')) {
                $this->shipping = 'Inside Dhaka';
                $this->retailDeliveryFee = 80;
            } else {
                $this->shipping = 'Outside Dhaka';
                $this->retailDeliveryFee = 130;
            }
            
            // Update cart shipping cost
            $this->updatedShipping();
        }
    }

    public function updatedAreaId($value): void
    {
        longCookie('area_id', $value);
        $this->cartUpdated();
    }

    protected function refreshCouponDiscount(): void
    {
        if (! $this->applied_coupon) {
            $this->coupon_discount = 0;

            return;
        }

        if (! $this->applied_coupon->isValid()) {
            $this->removeCoupon();

            return;
        }

        $this->coupon_discount = $this->applied_coupon->calculateDiscount(cart()->subTotal());
        longCookie('coupon_discount', $this->coupon_discount);
    }

    public function updatedRetailDeliveryFee($value): void
    {
        // Mark the delivery fee as manually overridden so that subsequent
        // shipping updates (e.g. changing area or cart) don't reset it.
        $this->retailDeliveryFeeManuallySet = true;
    }

    public function applyCoupon(): void
    {
        $this->validate([
            'coupon_code' => 'required|string|min:1',
        ]);

        $coupon = Coupon::findByCode($this->coupon_code);

        if (! $coupon) {
            $this->addError('coupon_code', 'Invalid coupon code.');

            return;
        }

        if ($coupon->coupon_type !== 'purchase') {
            $this->addError('coupon_code', 'This coupon can only be used for subscription payments.');

            return;
        }

        if (! $coupon->isValid()) {
            $this->addError('coupon_code', 'Coupon has expired or reached its usage limit.');

            return;
        }

        $subtotal = cart()->subTotal();
        $discount = $coupon->calculateDiscount($subtotal);

        if ($discount <= 0) {
            $this->addError('coupon_code', 'This coupon does not apply to the current cart.');

            return;
        }

        $this->applied_coupon = $coupon;
        $this->coupon_discount = $discount;
        longCookie('coupon_code', $this->coupon_code);
        longCookie('coupon_discount', $discount);
        $this->resetErrorBag('coupon_code');

        session()->flash('message', 'Coupon applied successfully.');
    }

    public function removeCoupon(): void
    {
        $this->applied_coupon = null;
        $this->coupon_discount = 0;
        $this->coupon_code = '';
        longCookie('coupon_code', '');
        longCookie('coupon_discount', 0);
        $this->resetErrorBag('coupon_code');
    }

    public function updatedCouponCode($value): void
    {
        longCookie('coupon_code', $value);
    }

    protected function restoreCouponFromCookie(): void
    {
        if (! $this->coupon_code) {
            return;
        }

        $coupon = Coupon::findByCode($this->coupon_code);

        if (! $coupon || ! $coupon->isValid() || $coupon->coupon_type !== 'purchase') {
            $this->removeCoupon();

            return;
        }

        $this->applied_coupon = $coupon;
        $this->coupon_discount = $coupon->calculateDiscount(cart()->subTotal());
        longCookie('coupon_discount', $this->coupon_discount);
    }

    public function remove($id): void
    {
        if (cart()->count() > 1) {
            cart()->remove($id);
            $this->cartUpdated();
        }
    }

    public function increaseQuantity($id): void
    {
        $item = cart()->get($id);
        if ($item) {
            cart()->update($id, $item->qty + 1);
            $this->cartUpdated();
        }
    }

    public function decreaseQuantity($id): void
    {
        $item = cart()->get($id);
        if ($item && $item->qty > 1) {
            cart()->update($id, $item->qty - 1);
            $this->cartUpdated();
        }
    }

    public function shippingCost(?string $area = null)
    {
        // Debug logging for shipping cost calculation
        logger()->debug('Calculating shipping cost', [
            'area' => $area,
            'current_shipping' => $this->shipping,
            'cart_subtotal' => cart()->subTotal(),
            'cart_count' => cart()->count(),
        ]);

        if (! cart()->subTotal()) {
            logger()->debug('Cart is empty, returning 0 shipping cost');
            return 0;
        }

        $this->isFreeDelivery = false;
        $area ??= $this->shipping;
        $shipping_cost = 0;
        
        if ($area) {
            // Priority to user requested fixed rates (80 / 130)
            if ($area === 'Inside Dhaka') {
                $shipping_cost = 80;
            } elseif ($area === 'Outside Dhaka') {
                $shipping_cost = 130;
            } else {
                // Fallback to settings if area name is different
                $deliverySettings = setting('delivery_charge');
                $shipping_cost = (int) ($deliverySettings?->outside_dhaka ?? 130);
            }
        }

        logger()->debug('Base shipping cost calculated', ['shipping_cost' => $shipping_cost]);

        $freeDelivery = setting('free_delivery');

        if (! ((bool) ($freeDelivery->enabled ?? false)) || ($freeDelivery->enabled ?? false) == 'false') {
            logger()->debug('Free delivery not enabled, returning base shipping cost');
            return $shipping_cost;
        }

        if ($freeDelivery->for_all ?? false) {
            if (cart()->subTotal() < $freeDelivery->min_amount) {
                logger()->debug('Subtotal below minimum for free delivery', [
                    'subtotal' => cart()->subTotal(),
                    'min_amount' => $freeDelivery->min_amount,
                ]);
                return $shipping_cost;
            }
            $quantity = cart()->content()->sum(fn ($product) => $product->qty);
            if ($quantity < $freeDelivery->min_quantity) {
                logger()->debug('Quantity below minimum for free delivery', [
                    'quantity' => $quantity,
                    'min_quantity' => $freeDelivery->min_quantity,
                ]);
                return $shipping_cost;
            }

            $this->isFreeDelivery = true;
            logger()->debug('Free delivery applied for all products');
            return 0;
        }

        foreach ((array) ($freeDelivery->products ?? []) as $id => $qty) {
            if (cart()->content()->where('options.parent_id', $id)->where('qty', '>=', $qty)->count()) {
                $this->isFreeDelivery = true;
                logger()->debug('Free delivery applied for specific product', ['product_id' => $id]);
                return 0;
            }
        }

        logger()->debug('No free delivery conditions met, returning base shipping cost');
        return $shipping_cost;
    }

    public function updatedShipping(): void
    {
        // Fix: getCost returns a formatted string like "1,000.00" or "80". 
        // We need to strip formatting to get a numeric value.
        $currentCartCost = (float) str_replace(',', '', cart()->getCost('deliveryFee'));
        $targetCost = (float) $this->shippingCost($this->shipping);
        
        // addCost is additive in this package, so we add the difference to "set" the value correctly.
        if ($targetCost !== $currentCartCost) {
            cart()->addCost('deliveryFee', $targetCost - $currentCartCost);
        }

        if (
            isOninda()
            && config('app.resell')
            && auth('user')->check()
            && ! $this->retailDeliveryFeeManuallySet
        ) {
            $reseller = auth('user')->user();
            $this->retailDeliveryFee = $reseller->getShippingCost($this->shipping) ?: (float) str_replace(',', '', cart()->getCost('deliveryFee'));
        } else {
            $this->retailDeliveryFee = (float) str_replace(',', '', cart()->getCost('deliveryFee'));
        }

        $this->dispatch('delivery-fee-updated', value: $this->retailDeliveryFee);
    }

    public function cartUpdated(): void
    {
        $this->updatedShipping();
        
        // Initialize retail array with proper default values to prevent null issues
        $this->retail = cart()->content()->mapWithKeys(function ($item): array {
            $productId = (string) $item->id;
            $existingPrice = $this->retail[$productId]['price'] ?? null;
            $defaultPrice = $item->options['retail_price'] ?? $item->price ?? 0;
            
            // Ensure we have a valid numeric price
            $price = is_numeric($existingPrice) ? $existingPrice : $defaultPrice;
            $price = is_numeric($price) ? (float) $price : 0;
            
            // Ensure quantity is valid
            $quantity = is_numeric($item->qty) ? (int) $item->qty : 1;
            
            return [$productId => [
                'price' => $price,
                'quantity' => $quantity,
            ]];
        })->all();
        
        $this->refreshCouponDiscount();
        $this->dispatch('cartUpdated');
    }

    public function mount(): void
    {
        if (isOninda() && auth('user')->guest()) {
            $this->redirect(route('user.login'), navigate: true);
        }

        $default_area = setting('default_area');
        $shipping = '';
        if ($default_area->inside ?? false) {
            $shipping = 'Inside Dhaka';
        }
        if ($default_area->outside ?? false) {
            $shipping = 'Outside Dhaka';
        }

        if ((! isOninda() || ! config('app.resell')) && $user = auth('user')->user()) {
            // User pre-filling removed to ensure blank form on every visit
            $this->retailDiscount = $user->discount ?? 0;
        } elseif ($this->fillFromCookie()) {
            // Logic removed to ensure blank form on every visit as requested
            $this->shipping = $shipping;
        }

        $this->restoreCouponFromCookie();
        // Initialize retail array properly
        $this->cartUpdated();
    }

    public function checkout()
    {
        \Illuminate\Support\Facades\Log::info('CHECKOUT ENTRY: checkout() method called.');
        try {
            // Validate required fields first
            $validationRules = [
                'name' => 'required|string|min:2|max:255',
                'phone' => 'required|string|min:10|max:15',
                'address' => 'required|string|min:5|max:1000',
                'shipping' => 'required|in:Inside Dhaka,Outside Dhaka',
                'retailDiscount' => 'nullable|numeric|min:0',
            ];

            // Add validation for city and area (Mandatory as per request)
            $validationRules['city_id'] = 'required|integer';
            $validationRules['area_id'] = 'required|integer';

            // Custom Bangla Validation Messages
            $validationMessages = [
                'name.required' => 'অনুগ্রহ করে আপনার পুরো নামটি লিখুন। এটি ছাড়া আমরা পণ্য ডেলিভারি করতে পারবো না।',
                'name.min' => 'আপনার নাম অন্তত ২ অক্ষরের হতে হবে।',
                'phone.required' => 'অনুগ্রহ করে আপনার ১১ ডিজিটের মোবাইল নম্বরটি লিখুন। আমরা এই নম্বরে ফোন করে আপনার অর্ডার কনফার্ম করবো।',
                'phone.min' => 'মোবাইল নম্বরটি কমপক্ষে ১০ সংখ্যার হতে হবে। উদাহরণ: 017XXXXXXXX',
                'phone.max' => 'মোবাইল নম্বরটি অনেক লম্বা হয়ে গেছে, দয়া করে চেক করুন।',
                'address.required' => 'অনুগ্রহ করে আপনার বিস্তারিত ঠিকানা (গ্রাম, থানা, জেলা) লিখুন। সঠিক ঠিকানা না দিলে ডেলিভারিতে সমস্যা হতে পারে।',
                'address.min' => 'ঠিকানাটি অত্যন্ত ছোট, দয়া করে বিস্তারিত ঠিকানা দিন।',
                'city_id.required' => 'তালিকায় থাকা শহর থেকে আপনার শহরটি সিলেক্ট করুন।',
                'area_id.required' => 'আপনার এলাকাটি সিলেক্ট করুন। এলাকা খুঁজে না পেলে নিকটস্থ এলাকা বেছে নিন।',
                'shipping.required' => 'ডেলিভারি লোকেশন সিলেক্ট করা হয়নি।',
            ];

            // Validate basic fields first
            $basicData = $this->validate($validationRules, $validationMessages);

            // Handle phone number formatting - Always add +88 prefix
            $phone = $basicData['phone'];
            
            // Normalize phone number to always have +88 prefix
            if (Str::startsWith($phone, '01')) {
                $phone = '+88'.$phone;
            } elseif (Str::startsWith($phone, '1')) {
                $phone = '+880'.$phone;
            } elseif (!Str::startsWith($phone, '+88')) {
                // If it doesn't start with +88, assume it's a local number and add prefix
                $phone = '+88'.$phone;
            }

            // Validate phone number format AFTER formatting
            // Expected format: +8801XXXXXXXXX (14 characters total)
            if (! preg_match('/^\+8801\d{9}$/', $phone)) {
                throw ValidationException::withMessages([
                    'phone' => 'অনুগ্রহ করে সঠিক ১১ ডিজিটের বাংলাদেশি মোবাইল নম্বর দিন (যেমন: 017XXXXXXXX)।'
                ]);
            }

            // Check cart is not empty
            if (cart()->count() === 0) {
                throw ValidationException::withMessages(['products' => 'আপনার কার্টটি খালি। অর্ডার করতে দয়া করে কার্টে পণ্য যোগ করুন।']);
            }

            // Validate retail data has proper values
            foreach ($this->retail as $productId => $retailData) {
                if (! isset($retailData['price']) || ! is_numeric($retailData['price']) || $retailData['price'] <= 0) {
                    throw ValidationException::withMessages([
                        'retail' => 'পণ্যের মূল্য বা পরিমাণে সমস্যা দেখা দিয়েছে। দয়া করে পেজটি রিফ্রেশ করে আবার চেষ্টা করুন।'
                    ]);
                }
                if (! isset($retailData['quantity']) || ! is_numeric($retailData['quantity']) || $retailData['quantity'] <= 0) {
                    throw ValidationException::withMessages([
                        'retail' => 'পণ্যের পরিমাণ সঠিক নয়। দয়া করে পেজটি রিফ্রেশ করে আবার চেষ্টা করুন।'
                    ]);
                }
            }

            // Check fraud limits
            $fraud = setting('fraud');
            $fraudLimitHourly = $fraud->allow_per_hour ?? 3;
            $fraudLimitDaily = $fraud->allow_per_day ?? 7;

            if (
                cacheMemo()->get('fraud:hourly:'.request()->ip()) >= $fraudLimitHourly
                || cacheMemo()->get('fraud:hourly:'.$phone) >= $fraudLimitHourly
                || cacheMemo()->get('fraud:daily:'.request()->ip()) >= $fraudLimitDaily
                || cacheMemo()->get('fraud:daily:'.$phone) >= $fraudLimitDaily
            ) {
                $this->dispatch('scroll-to-session-error');
                return back()->with('error', 'প্রিয় গ্রাহক, আরও অর্ডার করতে চাইলে আমাদের হেল্প লাইন '.setting('company')->phone.' নাম্বারে কল দিয়ে সরাসরি কথা বলুন।');
            }

            // Duplicate Order Check (By Phone)
            if (($fraud->block_duplicates ?? false) == '1') {
                $existingOrder = Order::where('phone', $phone)->first();
                if ($existingOrder) {
                    $whatsapp = setting('company')->whatsapp ?? setting('company')->phone;
                    $this->dispatch('scroll-to-session-error');
                    return back()->with('error', 'প্রিয় গ্রাহক, আমরা দেখতে পাচ্ছি আপনি ইতিমধ্যে একটি অর্ডার করেছেন। আপনার অর্ডারের বিষয়ে বিস্তারিত জানতে আমাদের হোয়াটসঅ্যাপে ('.$whatsapp.') যোগাযোগ করুন।');
                }
            }

            // IP & Device Lockout Check
            $isIpLocked = cacheMemo()->get('order_locked:ip:'.request()->ip());
            $lastOrderAt = Cookie::get('last_order_at');
            $isDeviceLocked = false;
            
            if ($lastOrderAt) {
                $lockoutHours = (int) (setting('fraud')->ip_lockout_hours ?? 72);
                $isDeviceLocked = now()->timestamp - (int)$lastOrderAt < ($lockoutHours * 3600);
            }

            if (($fraud->ip_lockout_enabled ?? false) == '1' && ($isIpLocked || $isDeviceLocked)) {
                $whatsapp = setting('company')->whatsapp ?? setting('company')->phone;
                $this->dispatch('scroll-to-session-error');
                return back()->with('error', 'প্রিয় গ্রাহক, আমরা দেখতে পাচ্ছি আপনি ইতিমধ্যে একটি অর্ডার করেছেন। নতুন অর্ডারের জন্য আমাদের হোয়াটসঅ্যাপে ('.$whatsapp.') যোগাযোগ করুন অথবা কিছুক্ষণ পর আবার চেষ্টা করুন।');
            }

            // Prepare final data
            $data = array_merge($basicData, [
                'phone' => $phone,
            ]);

            // Debug logging for order placement
            logger()->info('Checkout process started', [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'shipping' => $data['shipping'],
                'cart_count' => cart()->count(),
                'cart_subtotal' => cart()->subTotal(),
                'retail_data' => $this->retail,
                'retail_delivery_fee' => $this->retailDeliveryFee,
                'advanced' => $this->advanced,
                'retail_discount' => $this->retailDiscount,
            ]);

            $transactionResult = DB::transaction(function () use ($data, $fraud) {
                // Prepare products data with validation
                $productsData = [];
                foreach (cart()->content() as $item) {
                    $id = $item->id;
                    $maxQty = $fraud->max_qty_per_product ?? 3;
                    // Fix: If max_qty_per_product is 0 (misconfiguration), don't block order. Ensure at least 1.
                    $quantity = ($maxQty > 0) ? min($item->qty, $maxQty) : $item->qty;
                    $quantity = max(1, $quantity);

                    if ($quantity <= 0) {
                        continue;
                    }

                    // Get retail price or use default
                    $retailPrice = $this->retail[$id]['price'] ?? $item->price ?? 0;
                    if (! is_numeric($retailPrice) || $retailPrice <= 0) {
                        $retailPrice = $item->price ?? 0;
                    }

                    $productData = [
                        'id' => $id,
                        'name' => $item->name,
                        'price' => $item->price,
                        'retail_price' => $retailPrice,
                        'quantity' => $quantity,
                        'options' => $item->options->toArray(),
                    ];

                    $productsData[$id] = $productData;
                }

                if (empty($productsData)) {
                    logger()->warning('No valid products available for order', ['cart_content' => cart()->content()->toArray()]);
                    return $this->dispatch('notify', ['message' => 'No valid products available. Please refresh and try again.', 'type' => 'danger']);
                }

                $user = $this->getUser($data);
                $oldOrders = $user->orders()->get();
                $status = $this->getDefaultStatus();

                $oldOrders = Order::select(['id', 'admin_id', 'status'])->where('phone', $data['phone'])->get();
                $adminIds = $oldOrders->pluck('admin_id')->unique()->toArray();

                if (config('app.round_robin_order_receiving')) {
                    $adminQ = Admin::orderByRaw('CASE WHEN is_active = 1 THEN 0 ELSE 1 END, role_id desc, last_order_received_at asc');
                    $admin = count($adminIds) > 0 ? $adminQ->whereIn('id', $adminIds)->first() ?? $adminQ->first() : $adminQ->first();
                } else {
                    $adminQ = Admin::where('role_id', Admin::SALESMAN)->where('is_active', true)->inRandomOrder();
                    if (count($adminIds) > 0) {
                        $admin = $adminQ->whereIn('id', $adminIds)->first() ?? $adminQ->first() ?? Admin::where('is_active', true)->inRandomOrder()->first();
                    } else {
                        $admin = $adminQ->first() ?? Admin::where('is_active', true)->inRandomOrder()->first();
                    }
                }

                $orderData = [
                    'courier' => 'Other',
                    'is_fraud' => $oldOrders->whereIn('status', ['CANCELLED', 'RETURNED', 'PAID_RETURN'])->count() > 0,
                    'is_repeat' => $oldOrders->count() > 0,
                    'shipping_area' => $data['shipping'],
                    'shipping_cost' => $this->shippingCost($data['shipping']),
                    'retail_delivery_fee' => $this->retailDeliveryFee,
                    'advanced' => $this->advanced,
                    'retail_discount' => $this->retailDiscount,
                    'coupon_discount' => $this->coupon_discount,
                    'coupon_id' => $this->applied_coupon?->id,
                    'coupon_code' => $this->applied_coupon?->code,
                    'subtotal' => cart()->subtotal(),
                    'purchase_cost' => cart()->content()->sum(fn ($item): int|float => ($item->options->purchase_price ?: $item->options->price) * $item->qty),
                ];

                // Add city and area data with readable names
                if ($this->city_id) {
                    $city = \App\Models\District::find($this->city_id);
                    $orderData['city_id'] = $this->city_id;
                    $orderData['city_name'] = $city?->name;
                }
                if ($this->area_id) {
                    $area = \App\Models\Area::find($this->area_id);
                    $orderData['area_id'] = $this->area_id;
                    $orderData['area_name'] = $area?->name;
                }

                // Add Pathao info if enabled
                if ((setting('Pathao')->enabled ?? false) && (setting('Pathao')->user_selects_city_area ?? false)) {
                    $orderData['courier'] = 'Pathao';
                }

                $data += [
                    'source_id' => config('app.instant_order_forwarding') ? 0 : null,
                    'admin_id' => $admin->id ?? Admin::query()->inRandomOrder()->first()->id,
                    'user_id' => $user->id, // If User Logged In
                    'status' => $status,
                    'status_at' => now()->toDateTimeString(),
                    'products' => $productsData,
                    // Additional Data
                    'data' => $orderData,
                ];

                logger()->info('Creating order', [
                    'order_data' => $data,
                    'admin_id' => $admin->id ?? null,
                    'user_id' => $user->id,
                    'products_count' => count($productsData),
                ]);

                $order = Order::create($data);

                // Increment coupon usage if applied
                if ($this->applied_coupon) {
                    $this->applied_coupon->incrementUsage();
                }

                defer(function () use ($admin, $user, $order): void {
                    $admin->update(['last_order_received_at' => now()]);
                    $user->notify(new OrderPlaced($order));

                    deleteOrUpdateCart();

                    Cache::add('fraud:hourly:'.request()->ip(), 0, now()->addHour());
                    Cache::add('fraud:daily:'.request()->ip(), 0, now()->addDay());

                    Cache::increment('fraud:hourly:'.request()->ip());
                    Cache::increment('fraud:daily:'.request()->ip());

                    Cache::add('fraud:hourly:'.$order->phone, 0, now()->addHour());
                    Cache::add('fraud:daily:'.$order->phone, 0, now()->addDay());

                    Cache::increment('fraud:hourly:'.$order->phone);
                    Cache::increment('fraud:daily:'.$order->phone);

                    // Set IP & Device Lockout if enabled
                    $fraudSettings = setting('fraud');
                    if (($fraudSettings->ip_lockout_enabled ?? false) == '1') {
                        $lockoutHours = (int) ($fraudSettings->ip_lockout_hours ?? 72);
                        cacheMemo()->put('order_locked:ip:'.request()->ip(), true, now()->addHours($lockoutHours));
                        
                        // Set long-term cookie to track this device even if IP changes
                        Cookie::queue(Cookie::make('last_order_at', now()->timestamp, 10 * 365 * 24 * 60)); // 10 years expiration
                    }
                });

                return $order;
            });

            // LOGGING DEBUG FIX FOR TYPE ERROR
            if (!($transactionResult instanceof \App\Models\Order)) {
                 logger()->error('DB::transaction returned unexpected type: ' . get_class($transactionResult));
            }
            $order = $transactionResult;

            if (! $order instanceof \App\Models\Order) {
                logger()->error('Order creation failed - no order object returned');
                return back()->with('error', 'অর্ডার তৈরি করা সম্ভব হয়নি। অনুগ্রহ করে আবার চেষ্টা করুন।');
            }

            if (config('app.instant_order_forwarding') && ! config('app.demo')) {
                dispatch(new \App\Jobs\CallOnindaOrderApi($order->id));
            }

            cart()->destroy();
            session()->flash('completed', 'প্রিয় '.$data['name'].', আপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে। অর্ডার করার জন্য ধন্যবাদ।');

            logger()->info('Order successfully created', ['order_id' => $order->id]);

            return to_route($this->getRedirectRoute(), [
                'order' => $order?->getKey(),
            ]);
        } catch (ValidationException $e) {
            $this->dispatch('scroll-to-error');
            throw $e;
        } catch (\Exception $e) {
            logger()->error('Checkout failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $data ?? null,
            ]);

            // Flash error message to session
            session()->flash('error', 'অর্ডার প্লেস করা সম্ভব হয়নি: ' . $e->getMessage() . '। অনুগ্রহ করে আপনার তথ্য যাচাই করে আবার চেষ্টা করুন।');
            return;
        }
    }

    private function getUser($data)
    {
        if ($user = auth('user')->user()) {
            return $user;
        }

        // $user->notify(new AccountCreated());

        return User::query()->firstOrCreate(
            ['phone_number' => $data['phone']],
            array_merge(Arr::except($data, 'phone'), [
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ])
        );
    }


    public function render()
    {
        // Create a temporary Order instance to use its Pathao methods
        $tempOrder = new \App\Models\Order;
        
        // FORCE SINGLE TEMPLATE - NO SWITCHING
        $view = 'livewire.checkout';

        $currentAreas = $this->city_id 
            ? Area::where('district_id', $this->city_id)->orderBy('name', 'asc')->get() 
            : [];

        // Force recalculation of delivery fee for the view to ensure accuracy
        $viewDeliveryFee = $this->shippingCost($this->shipping);

        return view($view, [
            'user' => optional(auth('user')->user()),
            'cities' => District::orderBy('name', 'asc')->get(),
            'areas' => $currentAreas,
            'pathaoCities' => collect($tempOrder->pathaoCityList()),
            'pathaoAreas' => collect($tempOrder->pathaoAreaList($this->city_id)),
            'retail' => $this->retail,
            'advanced' => $this->advanced,
            'retailDeliveryFee' => $viewDeliveryFee,
            'retailDiscount' => $this->retailDiscount,
        ]);
    }

    protected function fillFromCookie(): bool
    {
        return true;
    }

    protected function getRedirectRoute(): string
    {
        return 'thank-you';
    }

    protected function getDefaultStatus()
    {
        return data_get(config('app.orders', []), 0, 'PENDING'); // Default Status
    }

    public function toJSON(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'shipping' => $this->shipping,
            'address' => $this->address,
            'note' => $this->note,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'retail' => $this->retail,
            'retailDeliveryFee' => $this->retailDeliveryFee,
            'advanced' => $this->advanced,
            'retailDiscount' => $this->retailDiscount,
            'coupon_code' => $this->coupon_code,
            'coupon_discount' => $this->coupon_discount,
        ];
    }

}
