<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$images = \App\Models\Image::select('id', 'path')->latest()->take(10)->get();
echo json_encode($images, JSON_PRETTY_PRINT);
?>
