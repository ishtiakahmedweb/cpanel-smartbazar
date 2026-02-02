<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class FeedController extends Controller
{
    public function catalog(): StreamedResponse
    {
        Log::info('Feed catalog requested', [
            'url' => request()->url(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
        ]);

        $this->trackFeedHit('catalog-csv');

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="catalog_products.csv"',
            'Cache-Control' => 'no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ];

        $callback = function (): void {
            try {
                if (ob_get_level() > 0) {
                    ob_clean();
                }
                $file = fopen('php://output', 'w');

                // Add BOM for UTF-8 to ensure proper encoding
                fwrite($file, "\xEF\xBB\xBF");

                // Add CSV column headers
                fputcsv($file, [
                    'id', 'title', 'description', 'availability', 'condition', 'price', 'link', 'image_link', 'brand',
                    'google_product_category', 'fb_product_category', 'quantity_to_sell_on_facebook', 'sale_price',
                    'sale_price_effective_date', 'item_group_id', 'gender', 'color', 'size', 'age_group', 'material',
                    'pattern', 'shipping', 'shipping_weight', 'gtin', 'video[0].url', 'video[0].tag[0]',
                    'product_tags[0]', 'product_tags[1]', 'style[0]',
                ]);

                // Process products in chunks for better memory management
                Product::with(['brand', 'categories', 'images', 'variations'])
                    ->where('is_active', true)
                    ->whereNull('parent_id') // Only parents; variants handled via parent loop
                    ->chunk(100, function ($products) use ($file): void {
                        foreach ($products as $product) {
                            try {
                                $this->writeProductRow($file, $product, $product->id);
                                // If product has variants, process the variants
                                if ($product->variations->isNotEmpty()) {
                                    foreach ($product->variations as $variant) {
                                        // Set the parent's brand and categories on the variant for easier access
                                        $variant->brand = $product->brand;
                                        $variant->categories = $product->categories;

                                        $this->writeProductRow($file, $variant, $product->id);
                                    }
                                }
                            } catch (\Exception $e) {
                                Log::error('Error processing product in feed', [
                                    'product_id' => $product->id,
                                    'error' => $e->getMessage(),
                                    'trace' => $e->getTraceAsString(),
                                ]);
                                // Continue processing other products
                            }
                        }
                    });

                fclose($file);

                Log::info('Feed catalog generated successfully');

            } catch (\Exception $e) {
                Log::error('Error generating feed catalog', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

                // Return error response instead of empty feed
                if (isset($file)) {
                    fclose($file);
                }

                // Output error as CSV
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Error', 'Failed to generate catalog feed']);
                fclose($file);
            }
        };

        return response()->stream($callback, 200, $headers);
    }

    public function catalogSimple()
    {
        try {
            Log::info('Simple feed catalog requested');
            $this->trackFeedHit('catalog-simple-csv');

            $products = Product::with(['brand', 'categories', 'images', 'variations'])
                ->where('is_active', true)
                ->whereNull('parent_id') // Only parents; variants handled via mapping
                ->get()
                ->flatMap(function ($product) {
                    if ($product->variations->isNotEmpty()) {
                        return $product->variations->map(function ($variant) use ($product) {
                            $variant->brand = $product->brand;
                            $variant->categories = $product->categories;

                            return $variant;
                        })->prepend($product);
                    }

                    return collect([$product]);
                });

            $csv = $this->generateCsvContent($products);

            return response($csv, 200, [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename="catalog_products.csv"',
                'Cache-Control' => 'no-cache, must-revalidate',
                'Pragma' => 'no-cache',
            ]);

        } catch (\Exception $e) {
            Log::error('Error generating simple feed catalog', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response('Error generating catalog feed', 500);
        }
    }

    public function facebookXml(): StreamedResponse
    {
        Log::info('Facebook XML feed requested', [
            'url' => request()->url(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
        ]);

        $this->trackFeedHit('facebook-xml');

        $headers = [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'Cache-Control' => 'no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ];

        $callback = function (): void {
            try {
                // Clear any previous output buffers to ensure no junk scripts or characters leak in
                if (ob_get_level() > 0) {
                    ob_clean();
                }

                echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
                echo '<rss xmlns:g="http://base.google.com/ns/1.0" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">' . PHP_EOL;
                echo '<channel>' . PHP_EOL;
                echo '<title>' . e(config('app.name', 'SmartBazar')) . '</title>' . PHP_EOL;
                echo '<atom:link href="' . e(url(request()->path())) . '" rel="self" type="application/rss+xml" />' . PHP_EOL;
                echo '<link>' . e(config('app.url')) . '</link>' . PHP_EOL;
                echo '<description>Product Catalog Feed</description>' . PHP_EOL;

                // Process products in chunks for memory efficiency
                Product::with(['brand', 'categories', 'images', 'variations'])
                    ->where('is_active', true)
                    ->whereNull('parent_id')
                    ->chunk(100, function ($products): void {
                        foreach ($products as $product) {
                            try {
                                $this->writeXmlItem($product, $product->id);
                                
                                // Process variants
                                if ($product->variations->isNotEmpty()) {
                                    foreach ($product->variations as $variant) {
                                        $variant->brand = $product->brand;
                                        $variant->categories = $product->categories;
                                        $this->writeXmlItem($variant, $product->id);
                                    }
                                }
                            } catch (\Exception $e) {
                                Log::error('Error processing product in XML feed', [
                                    'product_id' => $product->id,
                                    'error' => $e->getMessage(),
                                ]);
                            }
                        }
                    });

                echo '</channel>' . PHP_EOL;
                echo '</rss>' . PHP_EOL;

                Log::info('Facebook XML feed generated successfully');

            } catch (\Exception $e) {
                Log::error('Error generating Facebook XML feed', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
                
                echo '<error>Failed to generate XML feed</error>' . PHP_EOL;
            }
        };

        return response()->stream($callback, 200, $headers);
    }

    private function generateCsvContent($products): string
    {
        $output = fopen('php://temp', 'r+');

        // Add BOM for UTF-8
        fwrite($output, "\xEF\xBB\xBF");

        // Add headers
        fputcsv($output, [
            'id', 'title', 'description', 'availability', 'condition', 'price', 'link', 'image_link', 'brand',
            'google_product_category', 'fb_product_category', 'quantity_to_sell_on_facebook', 'sale_price',
            'sale_price_effective_date', 'item_group_id', 'gender', 'color', 'size', 'age_group', 'material',
            'pattern', 'shipping', 'shipping_weight', 'gtin', 'video[0].url', 'video[0].tag[0]',
            'product_tags[0]', 'product_tags[1]', 'style[0]',
        ]);

        foreach ($products as $product) {
            $this->writeProductRow($output, $product, $product->parent_id ?? $product->id);
        }

        rewind($output);
        $csv = stream_get_contents($output);
        fclose($output);

        return $csv;
    }

    private function writeProductRow($file, $product, $itemGroupId): void
    {
        // Format title: max 200 characters, remove HTML, convert to plain text
        $title = $this->formatTitle($product->var_name);

        // Format description: max 9999 characters, remove HTML, convert to plain text, no all caps
        $description = $this->formatDescription($product->description);

        // Safely format prices - ensure they are numeric
        $price = $this->formatPrice($product->price);
        $sellingPrice = $this->formatPrice($product->selling_price);
        $shippingInside = $this->formatPrice($product->shipping_inside);
        $shippingOutside = $this->formatPrice($product->shipping_outside);

        fputcsv($file, [
            // Use products.id as the content ID (unique per product row)
            $product->id,
            $title,
            $description,
            $product->in_stock ? 'in stock' : 'out of stock',
            'new',
            $price.' BDT',
            rtrim(config('app.url'), '/') . '/products/' . $product->slug,
            $product->base_image ? (str_starts_with($product->base_image->src, 'http') ? $product->base_image->src : rtrim(config('app.url'), '/') . '/' . ltrim($product->base_image->src, '/')) : '',
            $product->categories->first()?->full_name_path ?? 'Uncategorized',
            $product->categories->first()?->full_name_path ?? 'Uncategorized',
            $product->stock_count ?? 50,
            ($product->price > $product->selling_price) ? $sellingPrice.' BDT' : '',
            now()->addDays(30)->format('Y-m-d\TH:i\Z').'/'.now()->addDays(60)->format('Y-m-d\TH:i\Z'),
            // Keep group stable across variants. Use provided parent identifier.
            $itemGroupId,
            'unisex',
            '',
            '',
            'adult',
            '',
            '',
            'BD:Dhaka::Courier:'.$shippingInside.' BDT,BD:Outside Dhaka::Courier:'.$shippingOutside.' BDT',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ]);
    }

    private function formatTitle(string $title): string
    {
        // Remove HTML tags and decode entities
        $title = strip_tags($title);
        $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');

        // Trim whitespace
        $title = trim($title);

        // Limit to 200 characters
        return mb_substr($title, 0, 200);
    }

    private function formatDescription(string $description): string
    {
        // Remove HTML tags and decode entities
        $description = strip_tags($description);
        $description = html_entity_decode($description, ENT_QUOTES, 'UTF-8');

        // Remove extra whitespace and normalize line breaks
        $description = preg_replace('/\s+/', ' ', $description);
        $description = trim((string) $description);

        // Check if description is all caps and convert to proper case
        if (mb_strtoupper($description) === $description && mb_strlen($description) > 3) {
            $description = mb_convert_case($description, MB_CASE_TITLE, 'UTF-8');
        }

        // Limit to 9999 characters
        return mb_substr($description, 0, 9999);
    }

    private function formatPrice($price): string
    {
        // Handle null or empty values
        if ($price === null || $price === '') {
            return '0.00';
        }

        // Convert to string if it's not already
        $price = (string) $price;

        // Remove any non-numeric characters except decimal point
        $price = preg_replace('/[^0-9.]/', '', $price);

        // Handle empty string after cleaning
        if ($price === '' || $price === '.') {
            return '0.00';
        }

        // Convert to float and format
        $numericPrice = (float) $price;

        // Ensure it's not negative
        if ($numericPrice < 0) {
            $numericPrice = 0;
        }

        return number_format($numericPrice, 2);
    }

    private function writeXmlItem($product, $itemGroupId): void
    {
        $title = $this->formatTitle($product->var_name);
        $description = $this->formatDescription($product->description);
        $price = $this->formatPrice($product->price);
        $sellingPrice = $this->formatPrice($product->selling_price);
        $shippingInside = $this->formatPrice($product->shipping_inside);
        $shippingOutside = $this->formatPrice($product->shipping_outside);
        $appUrl = rtrim(config('app.url'), '/');
        $imageLink = $product->base_image ? (str_starts_with($product->base_image->src, 'http') ? $product->base_image->src : $appUrl . '/' . ltrim($product->base_image->src, '/')) : '';
        $categoryPath = $product->categories->first()?->full_name_path ?? 'Uncategorized';

        echo '  <item>' . PHP_EOL;
        echo '    <g:id>' . e($product->id) . '</g:id>' . PHP_EOL;
        echo '    <g:title>' . e($title) . '</g:title>' . PHP_EOL;
        echo '    <g:description><![CDATA[' . $description . ']]></g:description>' . PHP_EOL;
        echo '    <g:link>' . e($appUrl . '/products/' . $product->slug) . '</g:link>' . PHP_EOL;
        echo '    <g:image_link>' . e($imageLink) . '</g:image_link>' . PHP_EOL;
        echo '    <g:availability>' . ($product->in_stock ? 'in stock' : 'out of stock') . '</g:availability>' . PHP_EOL;
        echo '    <g:inventory>' . e($product->in_stock ? ($product->stock_count > 0 ? $product->stock_count : 100) : 0) . '</g:inventory>' . PHP_EOL;
        
        // Price Logic: g:price is regular, g:sale_price is discounted
        if ($product->price > $product->selling_price) {
            echo '    <g:price>' . e($price) . ' BDT</g:price>' . PHP_EOL;
            echo '    <g:sale_price>' . e($sellingPrice) . ' BDT</g:sale_price>' . PHP_EOL;
        } else {
            echo '    <g:price>' . e($sellingPrice) . ' BDT</g:price>' . PHP_EOL;
        }

        echo '    <g:brand>' . e($product->brand?->name ?? 'SmartBazar') . '</g:brand>' . PHP_EOL;
        echo '    <g:condition>new</g:condition>' . PHP_EOL;
        echo '    <g:google_product_category>' . e($categoryPath) . '</g:google_product_category>' . PHP_EOL;
        echo '    <g:fb_product_category>' . e($categoryPath) . '</g:fb_product_category>' . PHP_EOL;
        echo '    <g:quantity_to_sell_on_facebook>' . ($product->stock_count ?? 50) . '</g:quantity_to_sell_on_facebook>' . PHP_EOL;
        echo '    <g:item_group_id>' . e($itemGroupId) . '</g:item_group_id>' . PHP_EOL;
        
        // Shipping Blocks
        echo '    <g:shipping>' . PHP_EOL;
        echo '      <g:country>BD</g:country>' . PHP_EOL;
        echo '      <g:region>Dhaka</g:region>' . PHP_EOL;
        echo '      <g:service>Standard</g:service>' . PHP_EOL;
        echo '      <g:price>' . e($shippingInside) . ' BDT</g:price>' . PHP_EOL;
        echo '    </g:shipping>' . PHP_EOL;
        echo '    <g:shipping>' . PHP_EOL;
        echo '      <g:country>BD</g:country>' . PHP_EOL;
        echo '      <g:region>Outside Dhaka</g:region>' . PHP_EOL;
        echo '      <g:service>Standard</g:service>' . PHP_EOL;
        echo '      <g:price>' . e($shippingOutside) . ' BDT</g:price>' . PHP_EOL;
        echo '    </g:shipping>' . PHP_EOL;
        echo '  </item>' . PHP_EOL;
    }

    private function trackFeedHit(string $feedType): void
    {
        $hit = [
            'time' => now()->toDateTimeString(),
            'ip' => request()->ip(),
            'ua' => request()->userAgent(),
        ];

        cacheMemo()->put("feed_hit:{$feedType}", $hit, now()->addDays(7));
    }
}
