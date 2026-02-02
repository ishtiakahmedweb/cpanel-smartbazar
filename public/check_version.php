<?php
// NO DATABASE - JUST CHECK IF CODE IS UPDATED
header('Content-Type: text/plain; charset=utf-8');

echo "=== CODE VERSION CHECK ===\n\n";

// Check if .env has localhost
$envContent = file_get_contents(__DIR__ . '/../.env');
$hasLocalhost = str_contains($envContent, 'DB_HOST=localhost');

echo "1. Database Host: ";
if ($hasLocalhost) {
    echo "✓ UPDATED (localhost)\n";
} else {
    echo "✗ OLD (127.0.0.1) - NOT PULLED YET!\n";
}

// Check if bootstrap/app.php has error handler
$bootstrapContent = file_get_contents(__DIR__ . '/../bootstrap/app.php');
$hasErrorHandler = str_contains($bootstrapContent, 'QueryException');

echo "2. Global Error Handler: ";
if ($hasErrorHandler) {
    echo "✓ INSTALLED\n";
} else {
    echo "✗ MISSING - NOT PULLED YET!\n";
}

// Check if Setting model is fixed
$settingContent = file_get_contents(__DIR__ . '/../app/Models/Setting.php');
$hasFixedSetting = str_contains($settingContent, 'Store ONLY the value');

echo "3. Setting Model Fix: ";
if ($hasFixedSetting) {
    echo "✓ FIXED\n";
} else {
    echo "✗ OLD CODE - NOT PULLED YET!\n";
}

echo "\n";
if ($hasLocalhost && $hasErrorHandler && $hasFixedSetting) {
    echo "✓✓✓ YOU HAVE PULLED THE LATEST CODE! ✓✓✓\n";
    echo "\nNow run these commands:\n";
    echo "php artisan config:clear\n";
    echo "php artisan cache:clear\n";
    echo "php artisan view:clear\n";
} else {
    echo "❌ YOU HAVE NOT PULLED THE CODE YET!\n\n";
    echo "Run this command NOW:\n";
    echo "cd ~/Final_Deployment && git pull origin main\n";
}
