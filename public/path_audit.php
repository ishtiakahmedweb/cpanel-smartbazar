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

// --- SYMLINK CHECK ---
$publicStorage = __DIR__ . '/storage';
$symlinkInfo = [
    'path' => $publicStorage,
    'is_link' => is_link($publicStorage) ? 'YES' : 'NO',
    'is_dir' => is_dir($publicStorage) ? 'YES' : 'NO',
    'target' => is_link($publicStorage) ? readlink($publicStorage) : 'N/A',
    'target_exists' => (is_link($publicStorage) && file_exists(readlink($publicStorage))) ? 'YES' : 'NO',
    'server_doc_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown',
    'script_filename' => $_SERVER['SCRIPT_FILENAME'] ?? 'Unknown',
];

echo "<h1>Environment & Symlink Check</h1>";
echo "<pre>" . json_encode($symlinkInfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
echo "<hr>";
echo "<h1>Image Path Audit</h1>";
echo "<pre>" . json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
?>
