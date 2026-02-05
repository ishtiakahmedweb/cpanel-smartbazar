<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, HomeSection $section)
    {
        $rows = 3;
        $cols = 5;
        $productsPage = setting('products_page');
        if ($productsPage) {
            $rows = $productsPage->rows ?? 3;
            $cols = $productsPage->cols ?? 5;
        }
        $per_page = $request->get('per_page', $rows * $cols);
        $products = $section->products($per_page)->appends(request()->query());

        // Tracking
        if (\Spatie\GoogleTagManager\GoogleTagManagerFacade::isEnabled()) {
            $cookieName = 'section_tracked_' . $section->id . '_24h';
            $shieldEnabled = setting('data_layer_shield');

            if (! $shieldEnabled || ! $request->cookie($cookieName)) {
                // Page View
                \Spatie\GoogleTagManager\GoogleTagManagerFacade::set([
                    'event' => 'page_view',
                    'page_type' => 'home_section',
                    'section_name' => $section->name,
                ]);

                // Item List View
                \Spatie\GoogleTagManager\GoogleTagManagerFacade::set([
                    'event' => 'view_item_list',
                    'ecommerce' => [
                        'item_list_id' => 'section_' . $section->id,
                        'item_list_name' => 'Section: ' . $section->name,
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

        return view('products.index', compact('section', 'products', 'per_page', 'rows', 'cols'));
    }
}
