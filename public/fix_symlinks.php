<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

$publicPath = $app->publicPath();
$storagePublicPath = $app->storagePath() . '/app/public';

echo "Public Path: $publicPath\n";
echo "Storage Public Path: $storagePublicPath\n";

// 1. Fix public/storage
$storageLink = $publicPath . DIRECTORY_SEPARATOR . 'storage';
if (file_exists($storageLink) || is_link($storageLink)) {
    echo "Removing existing storage link/folder...\n";
    if (is_link($storageLink)) {
        unlink($storageLink);
    } else {
        // Recursive delete if it's a real folder (dangerous but necessary if it's a mistake)
        // For safety, let's just rename it if it has files
        if (count(scandir($storageLink)) > 2) {
             rename($storageLink, $storageLink . '_backup_' . time());
        } else {
             rmdir($storageLink);
        }
    }
}
symlink($storagePublicPath, $storageLink);
echo "Created symlink: $storageLink -> $storagePublicPath\n";

// 2. Fix public/strokya/images/products
$strokyaImages = $publicPath . DIRECTORY_SEPARATOR . 'strokya' . DIRECTORY_SEPARATOR . 'images';
$strokyaProducts = $strokyaImages . DIRECTORY_SEPARATOR . 'products';
$targetProducts = $storagePublicPath . DIRECTORY_SEPARATOR . 'products';

if (!file_exists($strokyaImages)) {
    mkdir($strokyaImages, 0755, true);
}

if (file_exists($strokyaProducts) || is_link($strokyaProducts)) {
    echo "Removing existing strokya products link/folder...\n";
    if (is_link($strokyaProducts)) {
        unlink($strokyaProducts);
    } else {
        if (count(scandir($strokyaProducts)) > 2) {
             rename($strokyaProducts, $strokyaProducts . '_backup_' . time());
        } else {
             rmdir($strokyaProducts);
        }
    }
}

symlink($targetProducts, $strokyaProducts);
echo "Created symlink: $strokyaProducts -> $targetProducts\n";

echo "DONE\n";
