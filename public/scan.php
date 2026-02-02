<?php
// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "--- DIAGNOSTIC REPORT ---\n";
echo "Public Path: " . public_path() . "\n";
echo "Storage Path: " . storage_path() . "\n";
echo "Base Path: " . base_path() . "\n";
echo "\n";

$storageLink = public_path('storage');
echo "Checking Symlink at: $storageLink\n";
if (file_exists($storageLink)) {
    echo " - file_exists: YES\n";
    if (is_link($storageLink)) {
        echo " - is_link: YES\n";
        echo " - Target: " . readlink($storageLink) . "\n";
        // Check if target exists
        $target = readlink($storageLink);
        // Resolve target if relative
        if (!file_exists($target) && !is_absolute_path($target)) {
             $target = dirname($storageLink) . '/' . $target;
        }
        echo " - Target Exists: " . (file_exists($target) ? "YES" : "NO") . "\n";
    } else {
        echo " - is_link: NO (It is a real directory)\n";
    }
} else {
    echo " - file_exists: NO\n";
}

echo "\n--- IMAGE DIRECTORIES ---\n";
$strokyaPath = public_path('strokya/images/products');
echo "Checking Strokya Path: $strokyaPath\n";
echo " - Exists: " . (file_exists($strokyaPath) ? "YES" : "NO") . "\n";

$storagePublic = storage_path('app/public');
echo "Checking Storage Public: $storagePublic\n";
echo " - Exists: " . (file_exists($storagePublic) ? "YES" : "NO") . "\n";
echo "\n";

function is_absolute_path($path) {
    if($path === null || $path === '') return false;
    return $path[0] === DIRECTORY_SEPARATOR || preg_match('~\A[A-Z]:(?![^/\\\\])~i',$path) > 0;
}
