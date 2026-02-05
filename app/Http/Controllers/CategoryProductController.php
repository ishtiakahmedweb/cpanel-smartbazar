<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\HasProductFilters;
use Illuminate\Http\Request;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

class CategoryProductController extends Controller
{
    use HasProductFilters;

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category)
    {
        $per_page = $request->get('per_page', 50);
        $query = $category->products()->whereIsActive(1)->whereNull('parent_id');

        // Apply filters
        $this->applyProductFilters($query, $request);

        // Apply sorting
        $this->applyProductSorting($query);

        // Eager load categories and reviews to prevent N+1 queries
        $products = $query->with([
            'categories',
            'reviews' => function ($q): void {
                $q->where('approved', true)->with('ratings');
            },
        ])->paginate($per_page)->appends(request()->query());

        // Get filter data - only attributes for products in this category
        $filterData = $this->getProductFilterData($category);

        return view('products.index', [
            'products' => $products,
            'per_page' => $per_page,
            'category' => $category,
            'hideCategoryFilter' => true,
        ] + $filterData);
    }
}
