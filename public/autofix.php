<?php
// autofix.php - The One-Click Repair Tool
// Combines Rescue (Folder Fix) and Symlink (Image Fix)

echo "<h1>🛠️ SmartBazar Auto-Repair Tool</h1>";

// --- CONFIGURATION ---
$basePath = realpath(__DIR__ . '/..'); // Project Root
$publicDir = __DIR__;                  // Public Folder
$rootStorage = $basePath . '/storage'; // The Main Storage Folder
$publicLink = $publicDir . '/storage'; // The Public Symlink
$storageTarget = $basePath . '/storage/app/public'; // Where images live

echo "<p><strong>Analysing System...</strong></p>";

// --- STEP 1: FIX ROOT STORAGE (The 500 Error Fix) ---
echo "<h3>Step 1: Checking Root Storage...</h3>";

if (is_link($rootStorage)) {
    echo "🚨 Found INVALID symlink at Root Storage. <br>";
    unlink($rootStorage);
    echo "✅ Removed bad link.<br>";
}

// Ensure Directory Structure Exists
$requiredDirs = [
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

foreach ($requiredDirs as $dir) {
    $path = $basePath . $dir;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "✅ Created missing directory: <code>$path</code><br>";
    }
}

// Create Log File
$logFile = $basePath . '/storage/logs/laravel.log';
if (!file_exists($logFile)) {
    file_put_contents($logFile, "[".date('Y-m-d H:i:s')."] AutoFix initialized.\n");
    echo "✅ Created log file.<br>";
}
echo "<strong style='color:green'>Root Storage System OK.</strong>";


// --- STEP 2: FIX IMAGE LINK (The Broken Image Fix) ---
echo "<h3>Step 2: Connecting Images...</h3>";

if (is_link($publicLink)) {
    $currentTarget = readlink($publicLink);
    if ($currentTarget != $storageTarget) {
        echo "⚠️ Found incorrect link. Removing... ";
        unlink($publicLink);
        echo "Done.<br>";
    }
} elseif (is_dir($publicLink)) {
    echo "⚠️ Found blocking directory. Removing... ";
    // Only remove empty or standard structure to be safe
    @rmdir($publicLink);
    echo "Done.<br>";
}

if (!file_exists($publicLink)) {
    echo "Linking <code>public/storage</code> → <code>storage/app/public</code>... ";
    if (symlink($storageTarget, $publicLink)) {
        echo "<strong style='color:green'>SUCCESS!</strong><br>";
    } else {
        echo "<strong style='color:red'>FAILED</strong> (Permission Error)<br>";
    }
} else {
    echo "<strong style='color:green'>Link is already correct.</strong><br>";
}


// --- STEP 3: INSTRUCTIONS ---
echo "<h2>✅ REPAIR COMPLETE.</h2>";
echo "<div style='background:#f4f4f4; padding:20px; border-left: 5px solid green;'>";
echo "<h3>⚠️ FINAL REQUIRED STEP (Do this in Terminal):</h3>";
echo "<p>Only one command is needed now to bring back your files:</p>";
echo "<pre style='background:#000; color:#0f0; padding:15px; font-size:16px;'>git restore .</pre>";
echo "<p>After running that, refresh your homepage.</p>";
echo "</div>";
?>
