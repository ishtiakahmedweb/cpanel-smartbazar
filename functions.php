<?php

use App\Http\Controllers\PageController;
use App\Http\Middleware\ShortKodeMiddleware;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSection;
use App\Models\Page;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slide;
use Azmolla\Shoppingcart\Cart as CartInstance;
use Azmolla\Shoppingcart\CartItem;
use Azmolla\Shoppingcart\Facades\Cart;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

if (! function_exists('cacheMemo')) {
    function cacheMemo(): CacheManager|CacheRepository
    {
        if (config('cache.memo')) {
            return cache()->memo();
        }

        return cache();
    }
}

if (! function_exists('cacheSupportsTags')) {
    function cacheSupportsTags(): bool
    {
        $store = cache()->getStore();

        return method_exists($store, 'tags');
    }
}

if (! function_exists('cacheNamespaceVersion')) {
    function cacheNamespaceVersion(string $namespace): int
    {
        $key = 'cache_namespaces:'.$namespace;
        $version = cache()->get($key);

        if (! $version) {
            $version = 1;
            cache()->forever($key, $version);
        }

        return (int) $version;
    }
}

if (! function_exists('bumpCacheNamespace')) {
    function bumpCacheNamespace(string $namespace): void
    {
        $key = 'cache_namespaces:'.$namespace;

        if (cache()->has($key) && method_exists(cache(), 'increment')) {
            cache()->increment($key);

            return;
        }

        cache()->forever($key, cacheNamespaceVersion($namespace) + 1);
    }
}

if (! function_exists('cacheNamespaceKey')) {
    function cacheNamespaceKey(string $key, string $namespace): string
    {
        $version = cacheNamespaceVersion($namespace);

        return $namespace.':v'.$version.':'.$key;
    }
}

if (! function_exists('cacheRememberNamespaced')) {
    function cacheRememberNamespaced(string $namespace, string $key, \DateTimeInterface|int|null $ttl, callable $callback): mixed
    {
        if (cacheSupportsTags()) {
            return cache()->tags($namespace)->remember($key, $ttl, $callback);
        }

        return cacheMemo()->remember(cacheNamespaceKey($key, $namespace), $ttl, $callback);
    }
}

if (! function_exists('cacheRememberForeverNamespaced')) {
    function cacheRememberForeverNamespaced(string $namespace, string $key, callable $callback): mixed
    {
        if (cacheSupportsTags()) {
            return cache()->tags($namespace)->rememberForever($key, $callback);
        }

        return cacheMemo()->rememberForever(cacheNamespaceKey($key, $namespace), $callback);
    }
}

if (! function_exists('cacheFlexibleNamespaced')) {
    /**
     * Cache with stale-while-revalidate strategy using namespaced keys.
     *
     * @param  string  $namespace  Cache namespace for invalidation
     * @param  string  $key  Cache key
     * @param  array{fresh: int, stale: int}|array{0: int, 1: int}  $ttl  Array with 'fresh' and 'stale' durations in seconds, or [fresh, stale] numeric array
     * @param  callable  $callback  Callback to generate cache data
     */
    function cacheFlexibleNamespaced(string $namespace, string $key, array $ttl, callable $callback): mixed
    {
        $cacheKey = cacheNamespaceKey($key, $namespace);

        // Convert associative array to numeric array if needed
        // Laravel's flexible() expects [fresh, stale] format
        if (isset($ttl['fresh']) && isset($ttl['stale'])) {
            $ttl = [$ttl['fresh'], $ttl['stale']];
        }

        if (cacheSupportsTags()) {
            return cache()->tags($namespace)->flexible($key, $ttl, $callback);
        }

        return cacheMemo()->flexible($cacheKey, $ttl, $callback);
    }
}

if (! function_exists('cacheInvalidateNamespace')) {
    function cacheInvalidateNamespace(string $namespace): void
    {
        if (cacheSupportsTags()) {
            cache()->tags($namespace)->flush();

            return;
        }

        bumpCacheNamespace($namespace);
    }
}

if (! function_exists('slides')) {
    function slides()
    {
        return cacheMemo()->rememberForever('slides', function () {
            return Slide::whereIsActive(1)->get([
                'title', 'text', 'mobile_src', 'desktop_src', 'btn_name', 'btn_href',
            ]);
        });
    }
}

if (! function_exists('sections')) {
    function sections()
    {
        return cacheMemo()->rememberForever('homesections', function () {
            return HomeSection::orderBy('order', 'asc')->get();
        });
    }
}

if (! function_exists('categories')) {
    function categories()
    {
        try {
            return cacheMemo()->rememberForever('api_categories:all', function() {
                // Load categories with images only
                $categoriesWithImages = Category::with('image')
                    ->where('is_enabled', true)
                    ->whereHas('image') // Only categories that have images
                    ->inRandomOrder()
                    ->get();

                // Load categories without images and eager load their product images
                $categoriesWithoutImages = Category::with('products.images')
                    ->where('is_enabled', true)
                    ->whereDoesntHave('image') // Only categories without images
                    ->inRandomOrder()
                    ->get();

                // Merge the two collections and map for final processing
                $categories = $categoriesWithImages->merge($categoriesWithoutImages);

                return $categories->map(function ($category) {
                    if ($category->relationLoaded('image')) {
                        $image = $category->image;
                    } else {
                        $images = $category->products->pluck('images')->filter();
                        $image = $images->isEmpty() ? null : $images->random()->first();
                    }

                    // Set the image_src property with a fallback placeholder
                    $category->image_src = cdn($image->src ?? 'https://placehold.co/600x600?text=No+Product');

                    return $category;
                });
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Categories DB error: ' . $e->getMessage());
            return collect();
        }
    }
}

if (! function_exists('brands')) {
    function brands()
    {
        try {
            return cacheMemo()->rememberForever('api_brands:all', function() {
                // Load brands with images only
                $brandsWithImages = Brand::with('image')
                    ->where('is_enabled', true)
                    ->whereHas('image') // Only brands that have images
                    ->inRandomOrder()
                    ->get();

                // Load brands without images and eager load their product images
                $brandsWithoutImages = Brand::with('products.images')
                    ->where('is_enabled', true)
                    ->whereDoesntHave('image') // Only brands without images
                    ->inRandomOrder()
                    ->get();

                // Merge the two collections and map for final processing
                $brands = $brandsWithImages->merge($brandsWithoutImages);

                return $brands->map(function ($brand) {
                    if ($brand->relationLoaded('image')) {
                        $image = $brand->image;
                    } else {
                        $images = $brand->products->pluck('images')->filter();
                        $image = $images->isEmpty() ? null : $images->random()->first();
                    }

                    // Set the image_src property with a fallback placeholder
                    $brand->image_src = cdn($brand->src ?? 'https://placehold.co/600x600?text=No+Product');

                    return $brand;
                });
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Brands DB error: ' . $e->getMessage());
            return collect();
        }
    }
}

if (! function_exists('pageRoutes')) {
    function pageRoutes()
    {
        try {
            if (Schema::hasTable((new Page)->getTable())) {
                Route::get('{page:slug}', PageController::class)
                    ->where('page', 'test-page|'.implode(
                        '|', Page::get('slug')
                            ->map->slug
                            ->toArray()
                    ))
                    ->middleware(ShortKodeMiddleware::class)
                    ->name('page');
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}

if (! function_exists('setting')) {
    function setting($name, $default = null)
    {
        try {
            return cacheMemo()->rememberForever('settings:'.$name, function () use ($name, $default) {
                $setting = Setting::whereName($name)->first();

                return $setting?->value ?? $default;
            });
        } catch (\Throwable $e) {
            // Return default or fake object to prevent crashes on chained access like setting('show_option')->enabled
            return $default ?? new class { public function __get($n) { return null; } };
        }
    }
}

if (! function_exists('generateEventId')) {
    function generateEventId()
    {
        return 'evt_'.bin2hex(random_bytes(8)).'_'.time();
    }
}

if (! function_exists('getBDIsoCode')) {
    function getBDIsoCode($name)
    {
        $name = strtolower(trim((string) $name));
        $map = [
            'bandarban' => 'BD-01', 'barguna' => 'BD-02', 'bogura' => 'BD-03', 'bogra' => 'BD-03', 'brahmanbaria' => 'BD-04',
            'bagerhat' => 'BD-05', 'barishal' => 'BD-06', 'barisal' => 'BD-06', 'bhola' => 'BD-07', 'cumilla' => 'BD-08',
            'comilla' => 'BD-08', 'chandpur' => 'BD-09', 'chattogram' => 'BD-10', 'chittagong' => 'BD-10', 'cox\'s bazar' => 'BD-11',
            'chuadanga' => 'BD-12', 'dhaka' => 'BD-13', 'dinajpur' => 'BD-14', 'faridpur' => 'BD-15', 'feni' => 'BD-16',
            'gopalganj' => 'BD-17', 'gazipur' => 'BD-18', 'gaibandha' => 'BD-19', 'habiganj' => 'BD-20', 'jamalpur' => 'BD-21',
            'jashore' => 'BD-22', 'jessore' => 'BD-22', 'jhenaidah' => 'BD-23', 'joypurhat' => 'BD-24', 'jaipurhat' => 'BD-24',
            'jhalakathi' => 'BD-25', 'kishoreganj' => 'BD-26', 'khulna' => 'BD-27', 'kurigram' => 'BD-28', 'khagrachhari' => 'BD-29',
            'khagrachari' => 'BD-29', 'kushtia' => 'BD-30', 'lakshmipur' => 'BD-31', 'lalmonirhat' => 'BD-32', 'manikganj' => 'BD-33',
            'mymensingh' => 'BD-34', 'munshiganj' => 'BD-35', 'madaripur' => 'BD-36', 'magura' => 'BD-37', 'moulvibazar' => 'BD-38',
            'meherpur' => 'BD-39', 'narayanganj' => 'BD-40', 'netrakona' => 'BD-41', 'narsingdi' => 'BD-42', 'narail' => 'BD-43',
            'natore' => 'BD-44', 'chapai nawabganj' => 'BD-45', 'nilphamari' => 'BD-46', 'noakhali' => 'BD-47', 'naogaon' => 'BD-48',
            'pabna' => 'BD-49', 'pirojpur' => 'BD-50', 'patuakhali' => 'BD-51', 'panchagarh' => 'BD-52', 'rajbari' => 'BD-53',
            'rajshahi' => 'BD-54', 'rangpur' => 'BD-55', 'rangamati' => 'BD-56', 'sherpur' => 'BD-57', 'satkhira' => 'BD-58',
            'sirajganj' => 'BD-59', 'sylhet' => 'BD-60', 'sunamganj' => 'BD-61', 'shariatpur' => 'BD-62', 'tangail' => 'BD-63',
            'thakurgaon' => 'BD-64',
        ];

        return $map[$name] ?? 'BD-13';
    }
}

if (! function_exists('formatPhone880')) {
    function formatPhone880($phone)
    {
        $phone = preg_replace('/[^\d]/', '', (string) $phone);
        if (str_starts_with($phone, '0')) {
            $phone = '88'.$phone;
        } elseif (! str_starts_with($phone, '880') && strlen($phone) == 10) {
            $phone = '880'.$phone;
        }

        return $phone;
    }
}

if (! function_exists('getFbCookie')) {
    function getFbCookie($name)
    {
        return $_COOKIE[$name] ?? request()->cookie($name);
    }
}

if (! function_exists('theMoney')) {
    function theMoney($amount, $decimals = null, $currency = 'TK')
    {
        // Ensure amount is numeric to prevent number_format errors
        if (! is_numeric($amount)) {
            $amount = (float) ($amount ?? 0);
        }

        // Ensure decimals is a valid integer
        if ($decimals === null || ! is_numeric($decimals)) {
            $decimals = 0;
        } else {
            $decimals = (int) $decimals;
        }

        return $currency.'&nbsp;<span>'.number_format($amount, $decimals).'</span>';
    }
}

function bytesToHuman($bytes)
{
    $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2).' '.$units[$i];
}

function hasErr($errors, $params)
{
    foreach (explode('|', $params) as $param) {
        if ($errors->has($param)) {
            return true;
        }
    }

    return false;
}

function genSKU($repeat = 5, $length = null)
{
    $sku = null;
    $length = $length ?: mt_rand(6, 10);
    $charset = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $multiplier = ceil($length / strlen($charset));
    // Generate SKU
    if (--$repeat) {
        $sku = substr(str_shuffle(str_repeat($charset, $multiplier)), 1, $length);
        Product::where('sku', $sku)->count() && genSKU($repeat);
    }

    return $sku;
}

function couriers()
{
    return array_filter([
        'Pathao',
        config('redx.enabled') ? 'Redx' : null,
        'SteadFast',
        'Other',
    ]);
}

function cdn(?string $url, int $w = 150, int $h = 150)
{
    if (! $url) {
        return asset('https://placehold.co/600x600?text=No+Image');
    }

    // 1. Process Absolute URLs (Strip local domain to allow re-prefixing)
    if (str_starts_with($url, 'http')) {
        $host = request()->getHost();
        if (str_contains($url, $host) && !str_contains($url, '??tr=')) {
            $url = ltrim(parse_url($url, PHP_URL_PATH), '/');
        } else {
            // Real external URL or placeholder, return as is
            return $url;
        }
    }

    $purePath = ltrim($url, '/');
    
    // 2. Identify Core Assets (whitelist) vs Uploaded Files
    $corePrefixes = ['strokya', 'assets', 'css', 'js', 'build', 'fonts', 'vendor', 'images/banners'];
    $publicFiles = ['payments.png', 'favicon.ico', 'favicon.png', 'tik-mark.png', 'robots.txt', 'logo.png'];
    
    $isPublic = false;
    foreach ($corePrefixes as $prefix) {
        if (str_starts_with($purePath, $prefix)) {
            $isPublic = true;
            break;
        }
    }
    if (!$isPublic && in_array($purePath, $publicFiles)) {
        $isPublic = true;
    }

    // 3. Prefix with storage/ ONLY if it's an uploaded file (not in whitelist and not already prefixed)
    if (!$isPublic && !str_starts_with($purePath, 'storage/')) {
        $purePath = 'storage/' . $purePath;
    }

    $baseUrl = asset($purePath);

    // 4. Apply CDN logic if configured
    if ($username = config('services.gumlet.username')) {
        return str_replace(request()->getHost(), $username.'.gumlet.io', $baseUrl).'?fit=resize&w='.$w.'&h='.$h;
    }

    if ($username = config('services.cloudinary.username')) {
        return 'https://res.cloudinary.com/'.$username.'/image/fetch/w_'.$w.',h_'.$h.',c_thumb/f_webp/'.$baseUrl;
    }

    if ($username = config('services.imagekit.username')) {
        return str_replace(request()->getHost(), 'ik.imagekit.io/'.$username, $baseUrl).'??tr=w-'.$w.',h-'.$h;
    }

    return $baseUrl;
}

if (! function_exists('cdnAsset')) {
    /**
     * Get CDN URL for an asset if CDN is enabled, otherwise return local asset.
     *
     * @param  string  $assetName  The asset name (e.g., 'jquery', 'bootstrap.css')
     * @param  string  $fallback  Fallback local asset path if CDN is disabled
     */
    function cdnAsset(string $assetName, string $fallback): string
    {
        if (! config('cdn.enabled', true)) {
            return asset($fallback);
        }

        $cdnConfig = config('cdn.assets', []);
        $provider = config('cdn.provider', 'jsdelivr');

        // Handle assets with separate CSS/JS (e.g., 'bootstrap.css', 'bootstrap.js', 'fontawesome.css', 'datatables.js-bootstrap5')
        if (str_contains($assetName, '.')) {
            $parts = explode('.', $assetName, 2);
            $name = $parts[0];
            $type = $parts[1];
            $asset = $cdnConfig[$name] ?? null;

            // Handle special cases like 'datatables.js-bootstrap5'
            if (str_contains($type, '-')) {
                [$jsType, $variant] = explode('-', $type, 2);
                if ($asset && isset($asset["{$jsType}-{$variant}"][$provider])) {
                    return $asset["{$jsType}-{$variant}"][$provider];
                }
            }

            if ($asset && isset($asset[$type][$provider])) {
                return $asset[$type][$provider];
            }
        } else {
            // Handle simple assets (e.g., 'jquery', 'svg4everybody')
            $asset = $cdnConfig[$assetName] ?? null;

            if ($asset) {
                // Check if it has a direct URL for the provider (for simple assets like jquery)
                if (isset($asset[$provider])) {
                    return $asset[$provider];
                }

                // Check if it has a 'js' key (for JS-only assets)
                if (isset($asset['js'][$provider])) {
                    return $asset['js'][$provider];
                }

                // Check if it has a 'css' key (for CSS-only assets)
                if (isset($asset['css'][$provider])) {
                    return $asset['css'][$provider];
                }
            }
        }

        // Fallback to local asset if CDN asset not found
        return asset($fallback);
    }
}

if (! function_exists('versionedAsset')) {
    /**
     * Get versioned asset URL for cache busting.
     */
    function versionedAsset(string $path, ?bool $secure = null): string
    {
        $url = asset($path, $secure);
        $version = config('app.asset_version', '1.0.0');

        return $url.(str_contains($url, '?') ? '&' : '?').'v='.$version;
    }
}

function longCookie($field, $value)
{
    if ($value) {
        Cookie::queue(Cookie::make($field, $value, 10 * 365 * 24 * 60)); // 10 years
    }
}

function cart($id = null): CartInstance|CartItem|null
{
    $cart = Cart::instance(session('kart', 'default'));

    if (! $id) {
        return $cart;
    }

    return $cart->content()->first(fn ($item) => $item->id == $id);
}

function storeOrUpdateCart($phone = null, $name = '')
{
    if (! $phone = $phone ?? Cookie::get('phone', '')) {
        return;
    }

    if (Str::startsWith($phone, '01')) {
        $phone = '+88'.$phone;
    } elseif (Str::startsWith($phone, '1')) {
        $phone = '+880'.$phone;
    }

    if (strlen($phone) != 14) {
        return;
    }

    $content = cart()->content()->mapWithKeys(fn ($item) => [$item->options->parent_id => $item]);

    if ($content->isEmpty()) {
        return;
    }

    $identifier = session()->getId();
    if ($cart = DB::table('shopping_cart')->where('phone', $phone)->first()) {
        $identifier = $cart->identifier;
    }

    $cart = DB::table('shopping_cart')
        ->where('identifier', $identifier)
        ->first();

    if ($cart) {
        DB::table('shopping_cart')
            ->where('identifier', $identifier)
            ->update([
                'identifier' => session()->getId(),
                'name' => Cookie::get('name', $name),
                'phone' => $phone,
                'content' => serialize($content->union(unserialize($cart->content))),
                'updated_at' => now(),
            ]);

        return;
    }

    DB::table('shopping_cart')
        ->insert([
            'name' => Cookie::get('name', $name),
            'phone' => $phone,
            'instance' => 'default',
            'identifier' => session()->getId(),
            'content' => serialize($content),
            'updated_at' => now(),
        ]);
}

function deleteOrUpdateCart()
{
    $phone = Cookie::get('phone', '');
    $content = cart()->content()->mapWithKeys(fn ($item) => [$item->options->parent_id => $item]);

    if (Str::startsWith($phone, '01')) {
        $phone = '+88'.$phone;
    } elseif (Str::startsWith($phone, '1')) {
        $phone = '+880'.$phone;
    }

    if (strlen($phone) != 14) {
        return;
    }

    $identifier = session()->getId();
    $cart = $cart = DB::table('shopping_cart')
        ->where('phone', $phone)
        ->first();
    if ($cart) {
        $identifier = $cart->identifier;
    }

    $cart = DB::table('shopping_cart')
        ->where('identifier', $identifier)
        ->first();

    if ($cart) {
        $content = unserialize($cart->content)->diffKeys($content);
        if ($content->isEmpty()) {
            return DB::table('shopping_cart')
                ->where('identifier', $identifier)
                ->delete();
        }
        DB::table('shopping_cart')
            ->where('identifier', $identifier)
            ->update([
                'name' => Cookie::get('name'),
                'phone' => $phone,
                'content' => serialize($content),
                'identifier' => session()->getId(),
                'updated_at' => now(),
            ]);

        return;
    }

    DB::table('shopping_cart')
        ->insert([
            'name' => Cookie::get('name'),
            'phone' => $phone,
            'instance' => 'default',
            'identifier' => session()->getId(),
            'content' => serialize($content),
            'updated_at' => now(),
        ]);
}

function isOninda(): bool
{
    return config('app.oninda');
}

function isReseller(): bool
{
    if (config('app.reseller') === false) {
        return false;
    }

    static $reseller = null;
    if ($reseller === null) {
        $reseller = (bool) config('app.oninda_url');
    }

    return $reseller;
}

function without88(string $phone): string
{
    return str_replace('+88', '', $phone);
}
