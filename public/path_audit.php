<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$images = \App\Models\Image::select('id', 'path')->latest()->take(10)->get();

$results = [];
foreach ($images as $img) {
    // Logic matching Image.php
    $cleanPath = ltrim($img->path, '/');
    if (str_starts_with($cleanPath, 'storage/')) {
        $cleanPath = substr($cleanPath, 8);
    }
    
    $physicalPath = storage_path('app/public/' . $cleanPath);
    
    $results[] = [
        'id' => $img->id,
        'db_path' => $img->path,
        'derived_clean_path' => $cleanPath,
        'physical_check' => [
            'path' => $physicalPath,
            'exists' => file_exists($physicalPath) ? 'YES' : 'NO'
        ],
        'generated_url' => asset('storage/' . rawurlencode($cleanPath))
    ];
}

echo "<h1>Image Path Audit</h1>";
echo "<pre>" . json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
?>
