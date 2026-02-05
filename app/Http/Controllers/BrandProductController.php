<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Traits\HasProductFilters;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    use HasProductFilters;

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Brand $brand)
    {
        $per_page = $request->get('per_page', 50);
        $query = $brand->products()->whereIsActive(1)->whereNull('parent_id');

        // Apply filters
        $this->applyProductFilters($query, $request);

        // Apply sorting
        $this->applyProductSorting($query);

        // Eager load reviews to prevent N+1 queries
        $products = $query->with([
            'reviews' => function ($q): void {
                $q->where('approved', true)->with('ratings');
            },
        ])->paginate($per_page)->appends(request()->query());

        // Tracking
        if (\Spatie\GoogleTagManager\GoogleTagManagerFacade::isEnabled()) {
            $cookieName = 'brand_tracked_' . $brand->id . '_24h';
            $shieldEnabled = setting('data_layer_shield');

            if (! $shieldEnabled || ! $request->cookie($cookieName)) {
                $eventId = generateEventId();
                // Page View
                \Spatie\GoogleTagManager\GoogleTagManagerFacade::set([
                    'event' => 'page_view',
                    'eventID' => $eventId,
                    'page_type' => 'brand',
                    'brand_name' => $brand->name,
                    'url' => $request->fullUrl(),
                    'page_location' => $request->fullUrl(),
                ]);

                // Item List View
                \Spatie\GoogleTagManager\GoogleTagManagerFacade::set([
                    'event' => 'view_item_list',
                    'eventID' => $eventId,
                    'ecommerce' => [
                        'item_list_id' => 'brand_' . $brand->id,
                        'item_list_name' => 'Brand: ' . $brand->name,
                        'items' => $products->map(fn ($product): array => [
                            'item_id' => $product->id,
                            'item_name' => $product->name,
                            'price' => $product->selling_price,
                            'item_category' => $product->category,
                            'quantity' => 1,
                        ])->toArray(),
                    ],
                ]);

                if ($shieldEnabled) {
                    \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
                }
            }
        }

        // Get filter data
        $filterData = $this->getProductFilterData();

        return view('products.index', [
            'products' => $products,
            'per_page' => $per_page,
            'brand' => $brand,
        ] + $filterData);
    }
}
