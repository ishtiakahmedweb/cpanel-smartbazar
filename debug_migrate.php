<?php
echo "Running migration for performance indexes...\n";
exec("php artisan reset_db.php 2>&1"); // Recreate fresh DB
$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar', 'root', '');
// Run migrations until before the performance one
// Actually let's just run them all and see.
exec("php artisan migrate --force 2>&1", $output);
echo implode("\n", $output);

$stmt = $mysql->query("SHOW CREATE TABLE products");
$res = $stmt->fetch();
echo "\n\nPRODUCTS SCHEMA:\n";
echo $res['Create Table'];
