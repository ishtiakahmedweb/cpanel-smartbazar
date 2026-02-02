<?php
/**
 * SmartBazar FINAL RESCUE SCRIPT
 * Run this to fix paths and symlinks on the server.
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Http\Kernel::class)->bootstrap(); // Set facade root

echo "--- SMARTBAZAR RESCUE INITIATED ---\n";

function ensureLink($target, $link) {
    echo "Processing Link: $link\n";
    if (file_exists($link) || is_link($link)) {
        echo " - Removing old link/folder at $link\n";
        if (is_link($link)) {
            unlink($link);
        } elseif (is_dir($link)) {
            // Rename if it contains data
            if (count(scandir($link)) > 2) {
                rename($link, $link . '_old_' . time());
            } else {
                rmdir($link);
            }
        }
    }
    
    if (symlink($target, $link)) {
        echo " - SUCCESS: Link created pointing to $target\n";
    } else {
        // Try junction for Windows testing
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec("mklink /J \"$link\" \"$target\"");
            echo " - INFO: Attempted Windows Junction.\n";
        } else {
            echo " - ERROR: Could not create link!\n";
        }
    }
}

// 1. Identify all potential public roots
$roots = [
    public_path(),
    realpath(__DIR__ . '/../public'),
    realpath(__DIR__ . '/../../public_html')
];
$roots = array_filter(array_unique($roots));

$storagePublic = storage_path('app/public');
$productStorage = $storagePublic . DIRECTORY_SEPARATOR . 'products';

foreach ($roots as $root) {
    if (!is_dir($root)) continue;
    echo "\nFixing Public Root: $root\n";
    
    // storage link
    ensureLink($storagePublic, $root . DIRECTORY_SEPARATOR . 'storage');
    
    // strokya products link
    $strokyaImages = $root . DIRECTORY_SEPARATOR . 'strokya' . DIRECTORY_SEPARATOR . 'images';
    if (!file_exists($strokyaImages)) {
        mkdir($strokyaImages, 0755, true);
    }
    ensureLink($productStorage, $strokyaImages . DIRECTORY_SEPARATOR . 'products');
}

echo "\n--- CLEARING ALL CACHES ---\n";
try {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    echo "Artisan check: " . \Illuminate\Support\Facades\Artisan::output() . "\n";
} catch (\Exception $e) {
    echo "Cache Clear Error: " . $e->getMessage() . "\n";
}

echo "\n--- RESCUE COMPLETE ---\n";
echo "Visit your site in Incognito Mode now.\n";
