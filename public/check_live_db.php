<?php
// Emergency Live DB Check
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;

header('Content-Type: text/plain');
echo "LIVE SERVER DB CHECK\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n";
echo "gtm_code: [" . Setting::get('gtm_code') . "]\n";
echo "gtm_id: [" . Setting::get('gtm_id') . "]\n";
echo "ResponseCache Clear Attempt...\n";
try {
    \Spatie\ResponseCache\Facades\ResponseCache::clear();
    echo "ResponseCache: Cleared\n";
} catch (\Exception $e) {
    echo "ResponseCache Error: " . $e->getMessage() . "\n";
}
