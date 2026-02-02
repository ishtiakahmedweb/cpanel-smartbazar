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
            // Use CDN URL - ensure proper path handling
            $cdnUrl = Config::get('app.url', url('/'));
            // Ensure path starts with storage/ for proper CDN handling
            $cleanPath = ltrim($path, '/');
            if (!str_starts_with($cleanPath, 'storage/')) {
                $cleanPath = 'storage/' . $cleanPath;
            }
            return $cdnUrl . '/' . $cleanPath;
        }

        // Use local asset URL - ensure proper storage path
        $cleanPath = ltrim($path, '/');
        
        // If the file already exists in public/, don't prefix with storage/
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        if (!str_starts_with($cleanPath, 'storage/')) {
            $cleanPath = 'storage/' . $cleanPath;
        }
        return asset($cleanPath);
    }
}

// Global helper function for backward compatibility
if (!function_exists('cdn')) {
    function cdn(?string $path, ?string $fallback = null): string
    {
        return \App\Helpers\ImageHelper::cdn($path, $fallback);
    }
}