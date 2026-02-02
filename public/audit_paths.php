<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Image;

echo "IMAGE PATH AUDIT\n";
echo "================\n\n";

$images = Image::latest()->take(10)->get();

foreach ($images as $img) {
    echo "ID: " . $img->id . "\n";
    echo "DB Path: " . $img->path . "\n";
    echo "Model src(): " . $img->src . "\n";
    echo "CDN output: " . cdn($img->path) . "\n";
    echo "--------------------\n";
}
