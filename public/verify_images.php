<?php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$app->make(Kernel::class)->bootstrap();

header('Content-Type: text/plain');

echo "--- Image Resolution Verification (Full Bootstrap) ---\n\n";

$testPaths = [
    'strokya/images/products/product-1.jpg', // Legacy/Theme path
    'products/product-1.jpg',               // DB path (relative to storage)
    'storage/products/product-1.jpg',       // Storage path
];

foreach ($testPaths as $path) {
    echo "Source Path: $path\n";
    try {
        $url = cdn($path);
        echo "Generated URL: $url\n";
        
        // Resolve to local file
        $localPath = '';
        $rootUrl = url('/');
        $relativeUrl = str_replace($rootUrl, '', $url);
        $localPath = public_path(ltrim($relativeUrl, '/'));
        
        // Handle /storage/ alias separately if it's a symlink
        if (str_starts_with(ltrim($relativeUrl, '/'), 'storage/')) {
             // In Laravel, public_path('storage') is the link to storage_path('app/public')
             // So public_path() check is actually correct if the link exists!
        }

        echo "Resolved File: $localPath\n";
        echo "File Exists: " . (file_exists($localPath) ? "YES" : "NO") . "\n";
    } catch (\Exception $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
    }
    echo "---------------------------------\n";
}

echo "\nAPP_URL: " . config('app.url') . "\n";
echo "Public Path: " . public_path() . "\n";
echo "Storage Path: " . storage_path() . "\n";
