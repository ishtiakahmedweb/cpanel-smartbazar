<?php
/**
 * Master System Audit Script
 * Checks all critical components of the Laravel application.
 */

define('LARAVEL_START', microtime(true));

// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

header('Content-Type: text/plain');

echo "========== SMARTBAZAR MASTER AUDIT ==========\n\n";

// 1. PATH RESOLUTION
echo "[1] PATH RESOLUTION\n";
echo "Public Path: " . public_path() . "\n";
echo "Storage Path: " . storage_path() . "\n";
echo "Base Path: " . base_path() . "\n";
$expectedPublic = realpath(base_path() . '/public');
if (realpath(public_path()) !== $expectedPublic) {
    echo "WARNING: Public path mismatch! Expected: $expectedPublic\n";
} else {
    echo "CHECK: Public path OK.\n";
}
echo "\n";

// 2. DATABASE CONNECTION
echo "[2] DATABASE CONNECTION\n";
try {
    Illuminate\Support\Facades\DB::connection()->getPdo();
    echo "CHECK: Database Connected Successfully.\n";
    echo "Database: " . config('database.connections.mysql.database') . "\n";
} catch (\Exception $e) {
    echo "ERROR: Database Connection Failed: " . $e->getMessage() . "\n";
}
echo "\n";

// 3. FILESYSTEM & SYMLINKS
echo "[3] FILESYSTEM & SYMLINKS\n";
$links = [
    'public/storage' => storage_path('app/public'),
    'public/strokya/images/products' => storage_path('app/public/products'),
];

foreach ($links as $linkPath => $target) {
    $fullLinkPath = base_path($linkPath);
    echo "Checking Link: $linkPath\n";
    if (file_exists($fullLinkPath)) {
        echo " - Exists: YES\n";
        if (is_link($fullLinkPath)) {
            echo " - Type: SYMLINK\n";
            echo " - Target: " . readlink($fullLinkPath) . "\n";
            echo " - Target Exists: " . (file_exists(readlink($fullLinkPath)) ? "YES" : "NO") . "\n";
        } elseif (is_dir($fullLinkPath)) {
            echo " - Type: DIRECTORY (Might be a Junction or real dir)\n";
            // Check if it's empty
            $files = scandir($fullLinkPath);
            echo " - File Count: " . (count($files) - 2) . "\n";
        }
    } else {
        echo " - ERROR: Link Missing!\n";
    }
}
echo "\n";

// 4. STORAGE PERMISSIONS
echo "[4] STORAGE PERMISSIONS\n";
$dirs = [
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache',
];

foreach ($dirs as $dir) {
    $fullDir = base_path($dir);
    echo "Checking: $dir\n";
    if (is_writable($fullDir)) {
        echo " - Writable: YES\n";
    } else {
        echo " - ERROR: NOT WRITABLE!\n";
    }
}
echo "\n";

// 5. CACHE SCAN
echo "[5] CACHE SCAN\n";
$cacheFiles = glob(base_path('bootstrap/cache/*.php'));
if (count($cacheFiles) > 0) {
    echo "WARNING: Stale cache files found in bootstrap/cache:\n";
    foreach ($cacheFiles as $f) {
        echo " - " . basename($f) . " (Modified: " . date('Y-m-d H:i:s', filemtime($f)) . ")\n";
    }
} else {
    echo "CHECK: bootstrap/cache is clean.\n";
}
echo "\n";

echo "========== END OF AUDIT ==========\n";
