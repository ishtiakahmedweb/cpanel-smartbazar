<?php
// Ultimate Migration Script
set_time_limit(0);

echo "STEP 1: Creating MySQL database...\n";
$mysql = new PDO('mysql:host=127.0.0.1', 'root', '');
$mysql->exec("DROP DATABASE IF EXISTS smart_bazaar");
$mysql->exec("CREATE DATABASE smart_bazaar");
echo "✓ Done\n\n";

echo "STEP 2: Running Laravel migrations...\n";
passthru("php artisan config:clear");
passthru("php artisan migrate:fresh --force 2>&1", $ret);

if ($ret !== 0) {
    die("\n✗ Migrations failed. Stopping.\n");
}

echo "\n✓ Tables created\n\n";

echo "STEP 3: Copying data from SQLite...\n";
$sqlite = new PDO("sqlite:" . __DIR__ . '/database/smart_bazaar.sqlite');
$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar', 'root', '');

$mysql->exec("SET FOREIGN_KEY_CHECKS=0");

$tables = ['admins', 'users', 'products', 'categories', 'brands', 'images', 'orders', 'slides', 'home_sections', 'pages', 'menus', 'menu_items', 'settings', 'category_product', 'image_product'];

$total = 0;
foreach ($tables as $table) {
    $count = $sqlite->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
    if ($count == 0) continue;
    
    $rows = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)) continue;
    
    $cols = array_keys($rows[0]);
    $placeholders = implode(',', array_fill(0, count($cols), '?'));
    $colList = '`' . implode('`, `', $cols) . '`';
    
    $mysql->exec("TRUNCATE TABLE `$table`");
    $stmt = $mysql->prepare("INSERT INTO `$table` ($colList) VALUES ($placeholders)");
    
    $inserted = 0;
    foreach ($rows as $row) {
        try {
            $stmt->execute(array_values($row));
            $inserted++;
        } catch (Exception $e) {}
    }
    
    echo "  ✓ $table: $inserted rows\n";
    $total += $inserted;
}

$mysql->exec("SET FOREIGN_KEY_CHECKS=1");

echo "\n✓ Migrated $total rows\n\n";
echo "STEP 4: Enabling features...\n";

$env = file_get_contents('.env');
$env = preg_replace('/CACHE_STORE=file/', 'CACHE_STORE=database', $env);
file_put_contents('.env', $env);

// Re-enable View::share
$provider = file_get_contents('app/Providers/AppServiceProvider.php');
$provider = str_replace('// \Illuminate\Support\Facades\View::share', '\Illuminate\Support\Facades\View::share', $provider);
file_put_contents('app/Providers/AppServiceProvider.php', $provider);

passthru("php artisan config:clear");
passthru("php artisan cache:clear");

echo "\n✅ COMPLETE! Refresh your browser.\n";
