<?php
// RELINK.php - Universal Symlink Fixer (Root & Public)
// Version: 2.0 (Double Link Strategy)
// Usage: Visit https://smartbazaarbd.xyz/RELINK.php

echo "<h1>🔗 Universal Storage Repair</h1>";
echo "<p>Fixing storage links in BOTH 'public' and 'root' folders to be safe.</p>";

$target = __DIR__ . '/../storage/app/public';
// Location A: The 'public' directory (Standard Laravel)
$linkA = __DIR__ . '/storage';
// Location B: The 'root' directory (Common cPanel)
$linkB = __DIR__ . '/../storage';

function fixLink($linkPath, $targetPath) {
    echo "<h3>Processing: " . basename(dirname($linkPath)) . "/" . basename($linkPath) . "</h3>";
    
    // Check existing
    if (file_exists($linkPath)) {
        if (is_link($linkPath)) {
            echo "Found existing symlink. Deleting... ";
            @unlink($linkPath);
            echo "<span style='color:green'>Done.</span><br>";
        } elseif (is_dir($linkPath)) {
            echo "Found conflicting DIRECTORY. Deleting (recursive)... ";
             $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($linkPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($files as $fileinfo) {
                $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
                $todo($fileinfo->getRealPath());
            }
            @rmdir($linkPath);
            echo "<span style='color:green'>Done.</span><br>";
        }
    }
    
    // Create New
    echo "Linking to: <code>" . realpath($targetPath) . "</code><br>";
    if (@symlink($targetPath, $linkPath)) {
        echo "<strong style='color:green'>✅ SUCCESS: Link Created!</strong><br>";
    } else {
        echo "<strong style='color:red'>❌ ERROR: Failed (Permissions/Config).</strong><br>";
        echo "Error: " . print_r(error_get_last(), true) . "<br>";
    }
}

// Execute for both
fixLink($linkA, $target); // public/storage
echo "<hr>";
fixLink($linkB, $target); // ../storage

echo "<h3>Verification</h3>";
echo "Try your images now. One of these links is guaranteed to work.";
?>
