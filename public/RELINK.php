<?php
// RELINK.php - Force Re-Creation of Storage Symlink
// Usage: Visit https://smartbazaarbd.xyz/RELINK.php

echo "<h1>🔗 Storage Symlink Repair</h1>";

$publicStorage = __DIR__ . '/storage';
$target = __DIR__ . '/../storage/app/public';

// 1. Check existing
if (file_exists($publicStorage)) {
    echo "<p>Found existing 'storage' item...</p>";
    if (is_link($publicStorage)) {
        echo "<p>It is a symlink. Deleting...</p>";
        if (@unlink($publicStorage)) {
            echo "<p style='color:green'>Deleted old symlink.</p>";
        } else {
            echo "<p style='color:red'>Failed to delete symlink.</p>";
        }
    } elseif (is_dir($publicStorage)) {
        echo "<p>It is a DIRECTORY. Attempting to remove...</p>";
        // Simple recursive delete for safety
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($publicStorage, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }
        if (@rmdir($publicStorage)) {
             echo "<p style='color:green'>Deleted colliding directory.</p>";
        } else {
             echo "<p style='color:red'>Failed to delete directory.</p>";
        }
    }
} else {
    echo "<p>No existing 'storage' item found (Clean slate).</p>";
}

// 2. Create New Link
echo "<p>Attempting to link: <br>Target: <code>$target</code> <br>Link: <code>$publicStorage</code></p>";

if (@symlink($target, $publicStorage)) {
    echo "<h2 style='color:green'>✅ SUCCESS: Symlink Created!</h2>";
    echo "<p>Test: <a href='/storage/test.txt'>Check if this link works (if file exists)</a></p>";
} else {
    echo "<h2 style='color:red'>❌ ERROR: Could not create symlink.</h2>";
    echo "<p>Last Error: " . print_r(error_get_last(), true) . "</p>";
}
?>
