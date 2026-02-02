<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

/**
 * Image helper functions for handling CDN and local image URLs
 */
class ImageHelper
{
    /**
     * Generate a CDN or local URL for an image
     *
     * @param string|null $path The image path
     * @param string|null $fallback Fallback URL if path is null
     * @return string The complete image URL
     */
    public static function cdn(?string $path, ?string $fallback = null): string
    {
        // Return fallback if path is null or empty
        if (empty($path)) {
            return $fallback ?? asset('assets/images/placeholder.png');
        }

        // Check if CDN is enabled
        $cdnEnabled = Config::get('cdn.enabled', false);
        
        if ($cdnEnabled) {
            // Use CDN URL
            $cdnUrl = Config::get('app.url', url('/'));
            return $cdnUrl . '/' . ltrim($path, '/');
        }

        // Use local asset URL
        return asset($path);
    }
}

// Global helper function for backward compatibility
if (!function_exists('cdn')) {
    function cdn(?string $path, ?string $fallback = null): string
    {
        return \App\Helpers\ImageHelper::cdn($path, $fallback);
    }
}