<?php

echo "<!DOCTYPE html><html><head><title>Deep Scan</title><style>body{font-family:sans-serif;max-width:900px;margin:2rem auto;padding:1rem} .card{background:#eee;padding:1rem;margin-bottom:1rem}</style></head><body>";
echo "<h1>🕵️ Deep System Scan</h1>";

// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "<div class='card'><h2>1. Path Configuration</h2>";
echo "<div><b>base_path():</b> " . base_path() . "</div>";
echo "<div><b>public_path():</b> " . public_path() . "</div>";
echo "<div><b>storage_path():</b> " . storage_path() . "</div>";
echo "<div><b>public_path('storage'):</b> " . public_path('storage') . "</div>";
echo "<div><b>Exists?</b> " . (file_exists(public_path('storage')) ? "YES" : "NO") . "</div>";
echo "</div>";

echo "<div class='card'><h2>2. Storage Content (Recursive)</h2>";
$target = storage_path('app/public');
echo "<div>Scanning: $target</div>";

function listFolderFiles($dir, &$results = [], $prefix = '') {
    if(!is_dir($dir)) return;
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if ($value != "." && $value != "..") {
            if (is_dir($path)) {
                // $results[] = $prefix . $value . "/";
                listFolderFiles($path, $results, $prefix . $value . "/");
            } else {
                $results[] = $prefix . $value . " (" . filesize($path) . " bytes)";
            }
        }
    }
    return $results;
}

if (file_exists($target)) {
    $allFiles = listFolderFiles($target);
    echo "<p>Found " . count($allFiles) . " files.</p>";
    echo "<pre style='max-height:400px;overflow:auto'>";
    foreach ($allFiles as $f) {
        echo $f . "\n";
    }
    echo "</pre>";
} else {
    echo "STORAGE FOLDER MISSING!";
}
echo "</div>";

echo "<div class='card'><h2>3. Image Logic Simulation</h2>";
// Simulate checking a file
if (count($allFiles) > 0) {
    $firstFile = $allFiles[0];
    // clean size info
    $firstFile = explode(' (', $firstFile)[0];
    
    $simulatedDbPath = "/storage/" . $firstFile; 
    echo "<div><b>Simulated DB Path:</b> $simulatedDbPath</div>";
    
    $check1 = public_path($simulatedDbPath);
    echo "<div>Check 1 (Direct): $check1 -> " . (file_exists($check1) ? "FOUND" : "NOT FOUND") . "</div>";
    
    $check2 = public_path(substr($simulatedDbPath, 1)); // no leading slash
    echo "<div>Check 2 (No lead slash): $check2 -> " . (file_exists($check2) ? "FOUND" : "NOT FOUND") . "</div>";

    $check3 = public_path('storage/' . $simulatedDbPath); // My bad fix
    echo "<div>Check 3 (My Bad Fix): $check3 -> " . (file_exists($check3) ? "FOUND" : "NOT FOUND") . "</div>";
}
echo "</div>";

echo "</body></html>";
