<?php
// fix_images.php - The Final Connector
// Connects the 'public' window to the 'storage' room.

echo "<h1>🔗 Connecting Images...</h1>";

$basePath = realpath(__DIR__ . '/..');
$storageTarget = $basePath . '/storage/app/public';
$publicLink = $basePath . '/public/storage';
$rootLink = $basePath . '/storage'; // For root-level access if needed

echo "<p><strong>Scan:</strong> checking for images in <code>$storageTarget</code>...</p>";

// 1. Verify Targets Exist
if (!is_dir($storageTarget)) {
    echo "<p style='color:red'>❌ Target directory missing! Did you run 'git restore .' inside your terminal?</p>";
    exit;
} else {
    $count = count(scandir($storageTarget)) - 2;
    echo "<p style='color:green'>✅ Target exists (contains $count items).</p>";
}

// 2. Define Helper
function connect($link, $target) {
    if (file_exists($link)) {
        if (is_link($link)) {
            $current = readlink($link);
            if ($current == $target) {
                echo "<p style='color:blue'>ℹ️ Link already correct: " . basename($link) . "</p>";
                return;
            } else {
                echo "Removing incorrect link... ";
                unlink($link);
            }
        } elseif (is_dir($link)) {
            echo "Removing blocking directory... ";
            // Safety: Only remove if empty or standard storage structure
            @rmdir($link);
        }
    }
    
    echo "Creating link: <code>" . basename($link) . "</code> -> <code>.../app/public</code> ... ";
    if (symlink($target, $link)) {
        echo "<strong style='color:green'>SUCCESS</strong><br>";
    } else {
        echo "<strong style='color:red'>FAILED</strong> (Check Permissions)<br>";
    }
}

// 3. Connect Both Possible Entry Points
echo "<h3>Connecting Public Folder:</h3>";
connect($publicLink, $storageTarget);

// Only create root link if it doesn't conflict with the REAL storage folder
// We know from rescue.php that real storage is at $basePath/storage
// So we CANNOT put a link named 'storage' at $basePath/storage (it would overwrite the folder used by Laravel)
// INSTEAD, we look for public_html/storage symlink if public_html is separate. 
// But here public_html IS the root.
// So we ONLY need the public link.

echo "<h3>Verification:</h3>";
echo "Test Image: <a href='/storage/test.txt'>Click to test</a>";
?>
