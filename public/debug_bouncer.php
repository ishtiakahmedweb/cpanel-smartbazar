<?php

echo "<style>body{font-family:sans-serif;padding:2rem} .ok{color:green} .err{color:red} pre{background:#eee;padding:1rem}</style>";

// Load Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

echo "<h1>🎈 Baby Bouncer Debug</h1>";

$products = Product::where('name', 'like', '%Baby Bouncer%')->with('images')->get();

if ($products->isEmpty()) {
    echo "<p class='err'>Product not found in DB.</p>";
}

foreach ($products as $p) {
    echo "<h2>Product: " . $p->name . " (ID: $p->id)</h2>";
    foreach ($p->images as $img) {
        echo "<div><b>Image ID:</b> $img->id</div>";
        echo "<div><b>DB Path:</b> <code>" . $img->path . "</code></div>";
        echo "<div><b>src Accessor:</b> <code>" . $img->src . "</code></div>";
        
        $relativePath = \Illuminate\Support\Str::after($img->path, '/storage/');
        $fullPath = storage_path('app/public/' . $relativePath);
        echo "<div><b>Physical Path:</b> $fullPath</div>";
        echo "<div><b>Exists?</b> " . (file_exists($fullPath) ? "<span class='ok'>YES</span>" : "<span class='err'>NO</span>") . "</div>";
        echo "<hr>";
    }
}

echo "<h2>🔎 Searching for 'bouncer' in files...</h2>";
$target = storage_path('app/public');
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($target));
foreach ($iterator as $file) {
    if ($file->isFile() && str_contains(strtolower($file->getFilename()), 'bouncer')) {
        echo "<div>FOUND: " . $file->getPathname() . "</div>";
    }
}
