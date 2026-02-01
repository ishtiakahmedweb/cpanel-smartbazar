<?php
echo "Running migrations...\n";
exec("php artisan migrate --force 2>&1", $output, $return_var);
echo implode("\n", $output);
echo "\nReturn code: $return_var\n";
