<?php
/**
 * SmartBazar LOCAL SETUP HELPER
 * Run: php setup_local.php
 */

echo "--- SMARTBAZAR LOCAL SETUP ---\n";

$baseDir = __DIR__;

// 1. Check storage symlink
$publicStorage = $baseDir . '/public/storage';
if (file_exists($publicStorage)) {
    echo " - Public storage link/folder exists. Attempting to ensure it's a valid link...\n";
}

echo " - Creating storage link...\n";
passthru('php artisan storage:link');

// 2. Clear caches
echo " - Clearing caches...\n";
passthru('php artisan optimize:clear');

// 3. Simple DB Check
// We use Artisan to check DB to be consistent with the environment
echo " - Checking database connection...\n";
passthru('php artisan db:monitor');

echo "\n--- SETUP COMPLETE ---\n";
echo "Run 'php artisan serve' and visit http://localhost:8000\n";
