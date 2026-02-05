<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\HomeSection;
use App\Models\Product;
use App\Traits\HasProductFilters;
use Illuminate\Http\Request;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

class ProductController extends Controller
{
    use HasProductFilters;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $section = null;
        $rows = 3;
        $cols = 5;
        $productsPage = setting('products_page');
        if ($productsPage) {
            $rows = $productsPage->rows ?? 3;
            $cols = $productsPage->cols ?? 5;
        }
        $per_page = $request->get('per_page', $rows * $cols);
        if ($section = request('filter_section', 0)) {
            $section = HomeSection::with('categories')->findOrFail($section);
            $products = $section->products($per_page);
        } else {
            $query = Product::whereIsActive(1)->whereNull('parent_id');

            // Apply filters
            $this->applyProductFilters($query, $request);

            // Search
            if ($request->search) {
                $products = Product::search($request->search, function ($q) use ($request): void {
                    $q->whereIsActive(1)->whereNull('parent_id');
                    $this->applyProductFilters($q, $request);
                    $this->applyProductSorting($q);
                })->paginate($per_page);
            } else {
                $this->applyProductSorting($query);
                $products = $query->with([
                    'reviews' => function ($q): void {
                        $q->where('approved', true)->with('ratings');
                    },
                ])->paginate($per_page);
            }
        }

        // Eager load reviews for products if not already loaded
        if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $products->getCollection()->loadMissing([
                'reviews' => function ($q): void {
                    $q->where('approved', true)->with('ratings');
                },
            ]);
        } else {
            $products->loadMissing([
                'reviews' => function ($q): void {
                    $q->where('approved', true)->with('ratings');
                },
            ]);
        }

        $products = $products
            ->appends(request()->query());

        if ($request->is('api/*')) {
            return ProductResource::collection($products);
        }

        // Get filter data
        $filterData = $this->getProductFilterData();

        return $this->view(compact('products', 'per_page', 'rows', 'cols', 'section') + $filterData);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->parent_id && $product->parent) {
            $product = $product->parent;
        }
        $product->load([
            'brand',
            'categories',
            'variations.options',
            'reviews' => function ($q): void {
                $q->where('approved', true)->with('ratings');
            },
        ]);

        if (GoogleTagManagerFacade::isEnabled()) {
            $cookieName = 'prod_view_tracked_' . $product->id . '_24h';
            $shieldEnabled = setting('data_layer_shield');

            if (! $shieldEnabled || ! request()->cookie($cookieName)) {
                GoogleTagManagerFacade::set([
                    'event' => 'page_view',
                    'eventID' => generateEventId(),
                    'page_type' => 'product',
                    'product_name' => $product->name,
                    'url' => request()->fullUrl(),
                    'page_location' => request()->fullUrl(),
                ]);

                if ($shieldEnabled) {
                    \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
                }
            }
        }

        return $this->view(compact('product'));
    }
}
