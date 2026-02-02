<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$publicPath = $app->publicPath();
$storagePublicPath = $app->storagePath() . '/app/public';

echo "Public Path: $publicPath\n";
echo "Storage Path: $storagePublicPath\n";

$strokyaProducts = $publicPath . DIRECTORY_SEPARATOR . 'strokya' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'products';
$targetProducts = $storagePublicPath . DIRECTORY_SEPARATOR . 'products';

// Ensure parent exists
$parent = dirname($strokyaProducts);
if (!file_exists($parent)) {
    mkdir($parent, 0755, true);
}

if (file_exists($strokyaProducts)) {
    echo "Strokya products path already exists. Checking if it's a link...\n";
    if (is_link($strokyaProducts)) {
        echo "It's a link. Leaving it.\n";
    } else {
        echo "It's a real folder. Renaming for safety.\n";
        rename($strokyaProducts, $strokyaProducts . '_old_' . time());
    }
}

if (!file_exists($strokyaProducts)) {
    echo "Attempting to create link/junction...\n";
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        echo "Detected Windows. Using mklink /J\n";
        $cmd = "mklink /J \"" . str_replace('/', '\\', $strokyaProducts) . "\" \"" . str_replace('/', '\\', $targetProducts) . "\"";
        exec($cmd, $output, $return);
        echo implode("\n", $output) . "\n";
        if ($return === 0) {
            echo "Junction created successfully.\n";
        } else {
            echo "Failed to create Junction. Fallback to copy if local?\n";
        }
    } else {
        echo "Detected Linux. Using symlink\n";
        if (symlink($targetProducts, $strokyaProducts)) {
            echo "Symlink created successfully.\n";
        } else {
            echo "Failed to create Symlink.\n";
        }
    }
}

// Verify
if (file_exists($strokyaProducts . DIRECTORY_SEPARATOR . 'product-1.jpg')) {
    echo "SUCCESS: Product-1 image is now visible through strokya path!\n";
} else {
    echo "FAILURE: Strokya path still not working.\n";
}
