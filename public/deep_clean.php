<?php
/**
 * SmartBazar Deep Clean Script
 * Purges all framework caches and compiled files.
 */

define('LARAVEL_START', microtime(true));
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

echo "--- STARTING DEEP CLEAN ---\n";

// 1. Purge bootstrap/cache
$bootstrapCache = glob(__DIR__ . '/../bootstrap/cache/*.php');
foreach ($bootstrapCache as $file) {
    if (unlink($file)) {
        echo "Deleted bootstrap cache: " . basename($file) . "\n";
    }
}

// 2. Purge storage/framework/cache
function cleanDir($dir) {
    if (!is_dir($dir)) return;
    $files = glob($dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
            echo "Deleted: $file\n";
        } elseif (is_dir($file) && !in_array(basename($file), ['.', '..'])) {
            cleanDir($file);
            @rmdir($file);
        }
    }
}

echo "Cleaning storage/framework/cache...\n";
cleanDir(__DIR__ . '/../storage/framework/cache/data');

echo "Cleaning storage/framework/views...\n";
cleanDir(__DIR__ . '/../storage/framework/views');

echo "Cleaning storage/framework/sessions...\n";
cleanDir(__DIR__ . '/../storage/framework/sessions');

echo "--- DEEP CLEAN COMPLETE ---\n";
echo "Note: You may need to run 'php artisan optimize' on the server after this.\n";
