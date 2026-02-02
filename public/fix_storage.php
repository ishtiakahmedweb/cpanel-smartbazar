<?php

echo "<!DOCTYPE html><html><head><title>System Scan</title><style>body{font-family:sans-serif;max-width:800px;margin:2rem auto;padding:1rem;background:#f4f4f4} .card{background:#fff;padding:1.5rem;margin-bottom:1rem;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1)} h2{margin-top:0} .ok{color:green;font-weight:bold} .err{color:red;font-weight:bold} pre{background:#eee;padding:1rem;overflow-x:auto;border-radius:4px}</style></head><body>";
echo "<h1>🕵️ System Health Scan</h1>";

// 1. Storage & Images
echo "<div class='card'><h2>1. Storage & Images</h2>";
$target = __DIR__ . '/../storage/app/public';
$shortcut = __DIR__ . '/storage';

echo "<div>Link Target: <code>$target</code></div>";
echo "<div>Link Shortcut: <code>$shortcut</code></div><br>";

if (file_exists($shortcut) && is_link($shortcut)) {
    echo "<div>Link Status: <span class='ok'>✅ CONNECTED</span></div>";
} else {
    echo "<div>Link Status: <span class='err'>❌ BROKEN/MISSING</span></div>";
    // Attempt fix
    if (!file_exists($shortcut)) {
       @symlink($target, $shortcut);
       echo "<div>Attempting Auto-Fix: " . (is_link($shortcut) ? "<span class='ok'>FIXED</span>" : "<span class='err'>FAILED</span>") . "</div>";
    }
}

if (file_exists($target)) {
    $files = array_diff(scandir($target), ['.', '..']);
    echo "<div>Files in Storage: <span class='ok'>" . count($files) . " items found</span></div>";
    // Check for a sample image
    $sample = reset($files);
    if ($sample) {
       echo "<div>Sample File: <code>$sample</code></div>";
       echo "<div>Public Access Check: <a href='/storage/$sample' target='_blank'>Click to View /storage/$sample</a></div>";
    }
} else {
    echo "<div>Storage Folder: <span class='err'>❌ MISSING ('storage/app/public' not found)</span></div>";
}
echo "</div>";

// 2. Database
echo "<div class='card'><h2>2. Database Connection</h2>";
try {
    // Load Laravel env just enough to check connection? No, raw PDO is safer and doesn't rely on framework boot
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    
    // Check DB
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        echo "<div>Connection: <span class='ok'>✅ SUCCESSFUL</span></div>";
        echo "<div>Database Name: " . \Illuminate\Support\Facades\DB::connection()->getDatabaseName() . "</div>";
        echo "<div>User Count: " . \Illuminate\Support\Facades\DB::table('users')->count() . "</div>";
    } catch (\Exception $e) {
        echo "<div>Connection: <span class='err'>❌ FAILED</span></div>";
        echo "<pre>" . $e->getMessage() . "</pre>";
    }

} catch (\Exception $e) {
    echo "<div>Framework Boot: <span class='err'>❌ FAILED</span></div>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
echo "</div>";

// 3. Environment
echo "<div class='card'><h2>3. Environment</h2>";
echo "<div>App Env: <b>" . env('APP_ENV') . "</b></div>";
echo "<div>Debug Mode: <b>" . (env('APP_DEBUG') ? '<span class="err">ENABLED (Be careful)</span>' : '<span class="ok">DISABLED</span>') . "</b></div>";
echo "<div>URL: <b>" . env('APP_URL') . "</b></div>";
echo "</div>";

// 4. Logs
echo "<div class='card'><h2>4. Recent Errors (Last 20 Log Lines)</h2>";
$logFile = __DIR__ . '/../storage/logs/laravel.log';
if (file_exists($logFile)) {
    $lines = file($logFile);
    $last20 = array_slice($lines, -20);
    echo "<pre>";
    foreach($last20 as $line) {
        echo htmlspecialchars($line);
    }
    echo "</pre>";
} else {
    echo "<div>Log File: <span class='ok'>No logs found (Clean)</span></div>";
}
echo "</div>";

echo "</body></html>";
