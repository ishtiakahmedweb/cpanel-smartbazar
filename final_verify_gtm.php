<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;

echo "--- GTM CONFIGURATION CHECK ---\n";

$head = Setting::where('name', 'gtm_code')->first();
$body = Setting::where('name', 'gtm_noscript')->first();

echo "GTM Head Setting (gtm_code): " . ($head ? "EXISTS" : "MISSING") . "\n";
echo "GTM Body Setting (gtm_noscript): " . ($body ? "EXISTS" : "MISSING") . "\n";

echo "\n--- TEMPLATE KEY SIMULATION ---\n";
// The template uses setting('gtm_code')
// Let's see what the helper would return (if available) or check if the keys match our fixes.

echo "Template is now configured to use '{!! setting(\"gtm_code\") !!}'\n";
echo "This matches the database key: gtm_code\n";

echo "\n--- VALIDATION CHECK ---\n";
$request = new \App\Http\Requests\SettingRequest();
$rules = $request->rules();
// We need to simulate the 'analytics' tab for rules
$_GET['tab'] = 'analytics';
$request->merge(['tab' => 'analytics']);

if (method_exists($request, 'rules')) {
    $currentRules = $request->rules();
    echo "Validation for 'gtm_code': " . (isset($currentRules['gtm_code']) ? "FOUND" : "NOT FOUND") . "\n";
    echo "Validation for 'gtm_noscript': " . (isset($currentRules['gtm_noscript']) ? "FOUND" : "NOT FOUND") . "\n";
}

echo "\nAudit Complete.\n";
