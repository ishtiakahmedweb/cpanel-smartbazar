<?php

echo "<h1>Storage Link Fixer</h1>";

$target = __DIR__ . '/../storage/app/public';
$shortcut = __DIR__ . '/storage';

echo "<p>Target (Real Folder): <code>$target</code></p>";
echo "<p>Shortcut (Link): <code>$shortcut</code></p>";

// 1. Check if target exists
if (!file_exists($target)) {
    echo "<p style='color:red'>ERROR: Target folder does not exist! You might need to upload your 'storage' folder content.</p>";
    exit;
}

// 2. Check if shortcut exists
if (file_exists($shortcut)) {
    echo "<p>Shortcut already exists. Checking type...</p>";
    if (is_link($shortcut)) {
        echo "<p>It is a link. Deleting to regenerate...</p>";
        unlink($shortcut);
    } elseif (is_dir($shortcut)) {
        echo "<p style='color:red'>WARNING: 'public/storage' is a real directory, not a link. I cannot delete it safely. Please delete it manually via File Manager.</p>";
        exit;
    } else {
        echo "<p>Deleting old file...</p>";
        unlink($shortcut);
    }
}

// 3. Create Link
if (symlink($target, $shortcut)) {
    echo "<h2 style='color:green'>SUCCESS: Storage link created!</h2>";
    echo "<p>Your images should be visible now.</p>";
} else {
    echo "<h2 style='color:red'>FAILED: Could not create link.</h2>";
    echo "<p>Server permissions might be preventing this script from creating symbolic links.</p>";
}
