<?php

echo "<h1>Storage Diagnostic Tool</h1>";

$target = __DIR__ . '/../storage/app/public';
$shortcut = __DIR__ . '/storage';

echo "<h3>1. Path Checks</h3>";
echo "Target (Real Folder): <code>$target</code><br>";
echo "Target Exists? " . (file_exists($target) ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";

echo "Shortcut (Link): <code>$shortcut</code><br>";
echo "Shortcut Exists? " . (file_exists($shortcut) ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";
echo "Is Link? " . (is_link($shortcut) ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";

echo "<h3>2. Content Check (First 5 files)</h3>";
if (file_exists($target)) {
    $files = scandir($target);
    $files = array_diff($files, ['.', '..']);
    
    if (count($files) > 0) {
        echo "<ul style='color:green'>";
        foreach (array_slice($files, 0, 5) as $file) {
            echo "<li>$file</li>";
        }
        echo "</ul>";
        echo "<p>Total files/folders: " . count($files) . "</p>";
    } else {
        echo "<p style='color:red; font-weight:bold;'>WARNING: The 'storage/app/public' folder is EMPTY! This is why images are broken.</p>";
    }
} else {
    echo "<p>Cannot check content because target folder does not exist.</p>";
}
