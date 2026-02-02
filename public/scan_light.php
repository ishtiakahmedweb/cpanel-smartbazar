<?php
// Load Laravel Autoloader
require __DIR__ . '/../vendor/autoload.php';
// Get the App instance directly
$app = require __DIR__ . '/../bootstrap/app.php';

echo "--- DIAGNOSTIC REPORT (Light Mode) ---\n";
// We can access paths directly from the container binding or methods
echo "Public Path: " . $app->publicPath() . "\n";
echo "Storage Path: " . $app->storagePath() . "\n";
echo "Base Path: " . $app->basePath() . "\n";
echo "\n";

$publicPath = $app->publicPath();
$storageLink = $publicPath . DIRECTORY_SEPARATOR . 'storage';

echo "Checking Symlink at: $storageLink\n";
if (file_exists($storageLink)) {
    echo " - file_exists: YES\n";
    if (is_link($storageLink)) {
        echo " - is_link: YES\n";
        echo " - Target: " . readlink($storageLink) . "\n";
    } else {
        echo " - is_link: NO (It is a real directory)\n";
    }
} else {
    echo " - file_exists: NO\n";
    // Check if we are checking the right place?
    echo " - Note: script is running from " . __DIR__ . "\n";
}

echo "\n--- IMAGE DIRECTORIES ---\n";
$strokyaPath = $publicPath . '/strokya/images/products';
echo "Checking Strokya Path: $strokyaPath\n";
echo " - Exists: " . (file_exists($strokyaPath) ? "YES" : "NO") . "\n";

$storagePublic = $app->storagePath() . '/app/public';
echo "Checking Storage Public: $storagePublic\n";
echo " - Exists: " . (file_exists($storagePublic) ? "YES" : "NO") . "\n";
