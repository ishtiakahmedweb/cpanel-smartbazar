<?php

namespace App\Traits;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

trait HasCart
{
    public function addToKart(Product $product, int $quantity = 1, string $instance = 'default', $retailPrice = null)
    {
        $originalInstance = $instance;

        if ($instance === 'landing') {
            cart()->instance('default')->destroy();
            $instance = 'default';
        }
        if ($instance === 'kart') {
            $instance = 'default';
        }
        session(['kart' => $instance]);

        $fraudQuantity = setting('fraud')->max_qty_per_product ?? 3;
        $maxQuantity = $product->should_track ? min($product->stock_count, $fraudQuantity) : $fraudQuantity;
        // Ensure we never try to add 0 items. If maxQuantity is 0, it means OOS, but we should handle that gracefully.
        // For now, let's ensure $quantity 1 works if checking logic allows it, or fail earlier.
        // Better fix: Ensure $maxQuantity is at least 1 for the logic below or handle OOS.
        
        $quantity = max(1, min($quantity, $maxQuantity));

        $productData = (new ProductResource($product))->toCartItem($quantity);
        $productData['max'] = $maxQuantity;
        $productData['retail_price'] = $retailPrice;

        cart()->instance($instance)->add(
            $product->id,
            $product->varName,
            $quantity,
            $productData['price'], // this is the wholesale price
            \Illuminate\Support\Arr::except($productData, ['quantity', 'total', 'price', 'retail_price', 'max', 'purchase_price'])
        );

        storeOrUpdateCart();

    // CRITICAL: Always use selling_price for accurate ROAS (not retail_price, not wholesale)
    $price = $product->selling_price;

    $this->dispatch('dataLayer', [
        'event' => 'add_to_cart',
        'eventID' => generateEventId(),
        'user_data' => [
            'external_id' => auth('user')->check() ? (string) auth('user')->id() : request()->cookie('guest_id', ''),
            'fbp' => getFbCookie('_fbp'),
            'fbc' => getFbCookie('_fbc'),
        ],
        'ecommerce' => [
            'currency' => 'BDT',
            'value' => (float) ($price * $quantity),
            'items' => [
                [
                    'item_id' => (string) $product->id,
                    'item_name' => (string) $product->varName,
                    'item_category' => (string) $product->category,
                    'price' => (float) $price,
                    'quantity' => (int) $quantity,
                ],
            ],
        ],
    ]);

        $this->dispatch('cartUpdated');
        $this->dispatch('notify', ['message' => 'Product added to cart']);

        if ($originalInstance !== 'default') {
            return to_route('checkout');
        }
    }
}
