<?php
// FORCE SYNC GTM - RESOLVING STUCK DATABASE
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;

$correctId = "GTM-G4CS8XYV";
$headScript = "<!-- Google Tag Manager -->\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':\nnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],\nj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=\n'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);\n})(window,document,'script','dataLayer','$correctId');</script>\n<!-- End Google Tag Manager -->";

$noScript = "<!-- Google Tag Manager (noscript) -->\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=$correctId\"\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n<!-- End Google Tag Manager (noscript) -->";

echo "FORCE SYNCING GTM TO: $correctId\n";

Setting::updateOrCreate(['name' => 'gtm_id'], ['value' => $correctId]);
Setting::updateOrCreate(['name' => 'gtm_code'], ['value' => $headScript]);
Setting::updateOrCreate(['name' => 'gtm_noscript'], ['value' => $noScript]);

echo "DB: Updated\n";

\cacheMemo()->forget('settings:gtm_id');
\cacheMemo()->forget('settings:gtm_code');
\cacheMemo()->forget('settings:gtm_noscript');
\cacheMemo()->forget('settings');

\Spatie\ResponseCache\Facades\ResponseCache::clear();
\Illuminate\Support\Facades\Artisan::call('view:clear');

echo "CACHE: Flushed\n";
echo "DONE. Your site should now be serving $correctId\n";
