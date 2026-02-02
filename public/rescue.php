<?php
// rescue.php - EMERGENCY REPAIR TOOL
// Fixes the "Too many levels of symbolic links" and 500 Error
// Rebuilds the destroyed storage directory structure

echo "<h1>🚑 Storage Rescue Operation</h1>";

$root = realpath(__DIR__ . '/..');
$badLink = $root . '/storage';

echo "<p>Target Root: $root</p>";

// 1. Remove the BAD symlink we created
if (is_link($badLink)) {
    echo "Found bad symlink at <code>$badLink</code>. Removing... ";
    unlink($badLink);
    echo "<strong style='color:green'>DONE</strong>.<br>";
} else {
    echo "No bad symlink found (Good).<br>";
}

// 2. Recreate Missing Directories
$dirs = [
    '/storage',
    '/storage/app',
    '/storage/app/public',
    '/storage/framework',
    '/storage/framework/cache',
    '/storage/framework/cache/data',
    '/storage/framework/views',
    '/storage/framework/sessions',
    '/storage/logs',
];

foreach ($dirs as $dir) {
    $path = $root . $dir;
    if (!file_exists($path)) {
        echo "Creating missing directory: <code>$path</code> ... ";
        if (mkdir($path, 0755, true)) {
            echo "<span style='color:green'>OK</span><br>";
        } else {
            echo "<span style='color:red'>FAILED</span><br>";
        }
    } else {
        echo "Directory exists: $path<br>";
    }
}

// 3. Create a test log file to verify write access
$logFile = $root . '/storage/logs/laravel.log';
if (!file_exists($logFile)) {
    file_put_contents($logFile, "[".date('Y-m-d H:i:s')."] Rescue script ran successfully.\n");
    echo "Created fresh log file.<br>";
}

echo "<h2>✅ Structure Repaired.</h2>";
echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li>Go to your terminal.</li>";
echo "<li>Run: <code>git restore .</code> (to bring back the deleted files/images)</li>";
echo "<li>Run: <code>php artisan optimize:clear</code></li>";
echo "</ol>";
?>
