<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Image;

header('Content-Type: text/plain');
echo "SMARTBAZAR DEEP IMAGE AUDIT\n";
echo "============================\n\n";

echo "1. LOGO SETTING\n";
$logo = setting('logo');
echo "Raw Logo: " . $logo . "\n";
echo "CDN Logo: " . cdn(asset($logo)) . "\n\n";

echo "2. LATEST SLIDES\n";
foreach (Slide::whereIsActive(1)->take(2)->get() as $slide) {
    echo "ID: {$slide->id}\n";
    echo "Desktop Raw: {$slide->desktop_src}\n";
    echo "Desktop CDN: " . cdn(asset($slide->desktop_src)) . "\n";
    echo "--------------------\n";
}
echo "\n";

echo "3. LATEST PRODUCTS\n";
foreach (Product::with('images')->latest()->take(2)->get() as $product) {
    echo "ID: {$product->id} | Name: {$product->name}\n";
    $img = $product->images->first();
    if ($img) {
        echo "Image ID: {$img->id}\n";
        echo "Image Path Raw (DB): {$img->path}\n";
        echo "Image src() accessor: {$img->src}\n";
        echo "CDN output: " . cdn($img->path) . "\n";
    } else {
        echo "No images associated.\n";
    }
    echo "--------------------\n";
}

echo "\n4. STORAGE SYMLINK CHECK\n";
$link = public_path('storage');
if (file_exists($link)) {
    echo "Symlink exists: " . (is_link($link) ? "YES (Symbolic)" : "NO (Real Directory)") . "\n";
    echo "Points to: " . readlink($link) . "\n";
} else {
    echo "Symlink does NOT exist.\n";
}

echo "\n5. RECENT FILE SCAN (storage/app/public)\n";
function scan($dir, &$results = array()) {
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            if (count($results) < 5) $results[] = $path;
        } else if ($value != "." && $value != "..") {
            scan($path, $results);
        }
    }
    return $results;
}
$found = [];
scan(storage_path('app/public'), $found);
foreach($found as $f) {
    echo "Found File: " . str_replace(storage_path('app/public'), '', $f) . "\n";
}
