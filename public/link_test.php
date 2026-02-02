<?php
// LINK_TEST.php - Deep Symlink & File Access Diagnostics
// Usage: Visit https://smartbazaarbd.xyz/LINK_TEST.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔗 Deep Link Diagnostics</h1>";
echo "<p>Checking why images exist on server but show broken in browser...</p>";

$publicDir = __DIR__;
$linkPath = $publicDir . '/storage';
$targetPath = realpath($publicDir . '/../storage/app/public');

echo "<h3>1. Path Configuration</h3>";
echo "<strong>Public Dir:</strong> $publicDir <br>";
echo "<strong>Intended Link:</strong> $linkPath <br>";
echo "<strong>Target Dir (Real):</strong> " . ($targetPath ? $targetPath : "<span style='color:red'>NOT FOUND</span>") . "<br>";

echo "<h3>2. Server Capabilities</h3>";
$canSymlink = function_exists('symlink');
echo "<strong>PHP symlink() function:</strong> " . ($canSymlink ? "<span style='color:green'>AVAILABLE</span>" : "<span style='color:red'>DISABLED</span>") . "<br>";
echo "<strong>Write Permission (Public):</strong> " . (is_writable($publicDir) ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";

echo "<h3>3. Current Link Status</h3>";
if (file_exists($linkPath)) {
    echo "Status: <strong>EXISTS</strong><br>";
    echo "Type: <strong>" . filetype($linkPath) . "</strong><br>";
    if (is_link($linkPath)) {
        $actualTarget = readlink($linkPath);
        echo "Points To: <code>$actualTarget</code><br>";
        if ($actualTarget === $targetPath) {
             echo "Match: <span style='color:green'>CORRECT ABSOLUTE PATH</span>";
        } elseif (realpath($publicDir . '/' . $actualTarget) === $targetPath) {
             echo "Match: <span style='color:green'>CORRECT RELATIVE PATH</span>";
        } else {
             echo "Match: <span style='color:red'>MISMATCH</span>";
        }
    }
} else {
    echo "Status: <span style='color:red'>MISSING (File not found)</span><br>";
    echo "This explains why standard <code>/storage/image.jpg</code> URLs fail.";
}

echo "<h3>4. File Visibility Test</h3>";
if ($targetPath) {
    $files = scandir($targetPath);
    $files = array_diff($files, ['.', '..', '.gitignore']);
    $firstFile = reset($files);
    
    if ($firstFile) {
        echo "Found file in Target: <strong>$firstFile</strong><br>";
        echo "Direct Read Test: " . (is_readable("$targetPath/$firstFile") ? "<span style='color:green'>READABLE</span>" : "<span style='color:red'>UNREADABLE</span>") . "<br>";
        
        $testUrl = "/storage/$firstFile";
        echo "Test URL: <a href='$testUrl' target='_blank'>$testUrl</a> (Try opening this)";
    } else {
        echo "Target directory is empty.";
    }
}

echo "<h3>5. Quick Fix Recommendation</h3>";
if (!file_exists($linkPath)) {
    echo "The link is missing. You MUST run the RELINK tool.";
} elseif (is_link($linkPath) && !file_exists($linkPath)) {
     echo "The link exists but is broken (points to nothing). You MUST run the RELINK tool.";
} else {
    echo "Link seems okay? If images still strictly fail, check 'Hotlink Protection' in cPanel.";
}
?>
