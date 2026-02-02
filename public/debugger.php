<?php
// debugger.php - Image & System Diagnostic Tool for SmartBazar
// Usage: Visit https://smartbazaarbd.xyz/debugger.php

// 1. Basic Setup
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<style>body{font-family:sans-serif;padding:20px;} table{border-collapse:collapse;width:100%;} th,td{border:1px solid #ddd;padding:8px;text-align:left;} .ok{color:green;font-weight:bold;} .err{color:red;font-weight:bold;}</style>";
echo "<h1>🕵️ SmartBazar Deep Diagnostic Tool</h1>";
echo "<p>Time: " . date('Y-m-d H:i:s') . " | PHP: " . phpversion() . "</p>";

// 2. Path Information
echo "<h2>1. Directory Structure Check</h2>";
echo "<strong>Current Script (__DIR__):</strong> " . __DIR__ . "<br>";
echo "<strong>Project Root (Assumed):</strong> " . realpath(__DIR__ . '/../') . "<br>";

$paths = [
    'public' => __DIR__,
    'storage (symlink?)' => __DIR__ . '/storage',
    'project_root/storage' => __DIR__ . '/../storage',
    'project_root/storage/app/public' => __DIR__ . '/../storage/app/public',
    'project_root/public/storage' => __DIR__ . '/../public/storage',
];

echo "<table><thead><tr><th>Path</th><th>Exists?</th><th>Type</th><th>Real Path</th><th>Permissions</th></tr></thead><tbody>";
foreach ($paths as $label => $path) {
    if (file_exists($path)) {
        $status = "<span class='ok'>YES</span>";
        $type = is_link($path) ? "🔗 SYMLINK -> " . readlink($path) : (is_dir($path) ? "📁 DIR" : "📄 FILE");
        $real = realpath($path);
        $perms = substr(sprintf('%o', fileperms($path)), -4);
    } else {
        $status = "<span class='err'>NO</span>";
        $type = "-";
        $real = "-";
        $perms = "-";
    }
    echo "<tr><td>$label<br><small>$path</small></td><td>$status</td><td>$type</td><td>$real</td><td>$perms</td></tr>";
}
echo "</tbody></table>";

// 3. Laravel Bootstrap & DB Check
echo "<h2>2. Database Image Check</h2>";
try {
    require __DIR__ . '/../vendor/autoload.php';
    $app = require __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    echo "<p class='ok'>✅ Laravel Bootstrapped Successfully</p>";
    
    // Check Images
    if (class_exists('App\Models\Image')) {
        $images = \App\Models\Image::latest()->take(5)->get();
        echo "<table><thead><tr><th>ID</th><th>DB Path (Raw)</th><th>Clean Path</th><th>Exists in 'storage/app/public'?</th><th>Generated Asset URL</th></tr></thead><tbody>";
        
        foreach ($images as $img) {
            $raw = $img->path;
            // Simulate logic
            $clean = ltrim($raw, '/'); // Remove leading slash
            $storageless = str_replace('storage/', '', $clean); 
            
            // Check physical file
            $physicalPath = storage_path('app/public/' . $storageless);
            $exists = file_exists($physicalPath);
            $existHtml = $exists ? "<span class='ok'>YES</span>" : "<span class='err'>NO</span> (Checked: $physicalPath)";
            
            // Asset URL
            $assetUrl = cdn($raw);
            
            echo "<tr>
                <td>{$img->id}</td>
                <td>$raw</td>
                <td>$storageless</td>
                <td>$existHtml</td>
                <td><a href='$assetUrl' target='_blank'>$assetUrl</a></td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='err'>Image model not found.</p>";
    }
    
    // Check Logos/Settings
    echo "<h3>Theme Assets (Logos)</h3>";
    $logo = setting('logo');
    echo "<strong>Setting('logo'):</strong> $logo<br>";
    echo "<strong>CDN Output:</strong> " . cdn($logo) . "<br>";

} catch (Exception $e) {
    echo "<p class='err'>❌ Application Error: " . $e->getMessage() . "</p>";
}

// 4. .htaccess Dump
echo "<h2>3. .htaccess Rules</h2>";
$htFile = __DIR__ . '/../.htaccess';
if (file_exists($htFile)) {
    echo "<textarea style='width:100%; height:200px; font-family:monospace;'>" . htmlspecialchars(file_get_contents($htFile)) . "</textarea>";
} else {
    echo "<p class='err'>.htaccess not found!</p>";
}
?>
