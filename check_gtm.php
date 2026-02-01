<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function check_setting($name) {
    $val = setting($name);
    echo "SETTING '$name': " . (is_null($val) ? "NULL" : (is_scalar($val) ? var_export($val, true) : json_encode($val))) . "\n";
}

check_setting('analytics');
check_setting('gtm_code');
check_setting('gtm_noscript');
check_setting('pixel_ids');
