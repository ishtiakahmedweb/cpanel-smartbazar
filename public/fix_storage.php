<?php

echo "<!DOCTYPE html><html><head><title>Storage Write Test</title><style>body{font-family:sans-serif;max-width:900px;margin:2rem auto;padding:1rem} .card{background:#eee;padding:1rem;margin-bottom:1rem} .ok{color:green} .err{color:red}</style></head><body>";
echo "<h1>🧪 Storage Write Test</h1>";

// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use Illuminate\Support\Facades\Storage;

echo "<div class='card'><h2>1. Config Dump</h2>";
$config = config('filesystems.disks.public');
echo "<pre>" . print_r($config, true) . "</pre>";
echo "<div>storage_path(): " . storage_path() . "</div>";
echo "</div>";

echo "<div class='card'><h2>2. Write Test (Storage Facade)</h2>";
$filename = 'write_test_' . time() . '.txt';
$content = 'Test content written at ' . date('Y-m-d H:i:s');

try {
    echo "<div>Attempting to write <b>$filename</b> to <b>public</b> disk...</div>";
    
    $result = Storage::disk('public')->put($filename, $content);
    
    if ($result) {
        echo "<div>Result: <span class='ok'>SUCCESS (Returned true)</span></div>";
        
        $url = Storage::url($filename);
        echo "<div>Generated URL: <b>$url</b></div>";
        
        $fullPath = storage_path('app/public/' . $filename);
        if (file_exists($fullPath)) {
            echo "<div>Physical File Check: <span class='ok'>FOUND at $fullPath</span></div>";
        } else {
            echo "<div>Physical File Check: <span class='err'>NOT FOUND at $fullPath</span></div>"; // If this happens, config is lying about root
        }
        
        // Cleanup
        // Storage::disk('public')->delete($filename);
    } else {
        echo "<div>Result: <span class='err'>FAILED (Returned false)</span></div>";
    }

} catch (\Exception $e) {
    echo "<div>Exception: <span class='err'>" . $e->getMessage() . "</span></div>";
}
echo "</div>";

echo "<div class='card'><h2>3. Symlink Status</h2>";
$link = base_path('storage_link');
if (file_exists($link)) {
    echo "<div>Link Exists: <span class='ok'>YES</span></div>";
    echo "<div>Target: " . readlink($link) . "</div>";
    
    // Check if URL works via cURL? No, just link it
    if (isset($url)) {
        // Rewrite URL to use storage_link manually to test
        $testUrl = str_replace('/storage/', '/storage_link/', $url);
        echo "<div><a href='$testUrl' target='_blank'>Click to test Read Access via /storage_link/</a></div>";
    }
} else {
    echo "<div>Link Exists: <span class='err'>NO</span> (Click 'Fix Storage' in previous tool or run command)</div>";
}
echo "</div>";

echo "</body></html>";
