<?php
header('Content-Type: text/plain; charset=utf-8');

function listDir($dir, $depth = 0) {
    if ($depth > 2) return;
    if (!is_dir($dir)) return;
    
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        echo str_repeat("  ", $depth) . $file . (is_dir($dir . '/' . $file) ? "/" : "") . "\n";
        if (is_dir($dir . '/' . $file) && !in_array($file, ['vendor', 'node_modules', '.git'])) {
            listDir($dir . '/' . $file, $depth + 1);
        }
    }
}

echo "Current Dir: " . __DIR__ . "\n";
echo "--- Directory Structure ---\n";
listDir(dirname(__DIR__, 1)); // One level up from public
echo "\n--- Two Levels Up ---\n";
listDir(dirname(__DIR__, 2)); // Two levels up
