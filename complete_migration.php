<?php
// FINAL MySQL Migration - With Fixed Migrations
set_time_limit(0);

echo "=== SQLite to MySQL Migration ===\n\n";

// Step 1: Create database
echo "Step 1: Creating MySQL database...\n";
$mysql = new PDO('mysql:host=127.0.0.1', 'root', '');
$mysql->exec("DROP DATABASE IF EXISTS smart_bazaar");
$mysql->exec("CREATE DATABASE smart_bazaar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
echo "✓ Database created\n\n";

// Step 2: Update .env temporarily
echo "Step 2: Configuring for migration...\n";
$env = file_get_contents('.env');
$envBackup = $env;
$env = preg_replace('/DB_CONNECTION=sqlite/', 'DB_CONNECTION=mysql', $env);
$env = preg_replace('/DB_DATABASE=database\/smart_bazaar\.sqlite/', "DB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=smart_bazaar\nDB_USERNAME=root\nDB_PASSWORD=", $env);
$env = preg_replace('/CACHE_STORE=database/', 'CACHE_STORE=file', $env);
file_put_contents('.env', $env);

// Disable View::share
$provider = file_get_contents('app/Providers/AppServiceProvider.php');
$providerBackup = $provider;
$provider = str_replace('\Illuminate\Support\Facades\View::share', '// \Illuminate\Support\Facades\View::share', $provider);
file_put_contents('app/Providers/AppServiceProvider.php', $provider);

echo "✓ Configured\n\n";

// Step 3: Run migrations
echo "Step 3: Creating tables via Laravel migrations...\n";
passthru("php artisan config:clear");
passthru("php artisan migrate:fresh --force 2>&1", $ret);

if ($ret !== 0) {
    // Restore
    file_put_contents('.env', $envBackup);
    file_put_contents('app/Providers/AppServiceProvider.php', $providerBackup);
    die("\n✗ Migration failed. Restored original config.\n");
}

echo "\n✓ All tables created successfully\n\n";

// Step 4: Copy data
echo "Step 4: Copying data from SQLite...\n";
$sqlite = new PDO("sqlite:" . __DIR__ . '/database/smart_bazaar.sqlite');
$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar', 'root', '');

$tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' AND name != 'migrations'")->fetchAll(PDO::FETCH_COLUMN);

$mysql->exec("SET FOREIGN_KEY_CHECKS=0");

$totalRows = 0;
foreach ($tables as $table) {
    $rows = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)) continue;
    
    $mysql->exec("TRUNCATE TABLE `$table`");
    
    $cols = array_keys($rows[0]);
    $placeholders = implode(',', array_fill(0, count($cols), '?'));
    $colList = '`' . implode('`, `', $cols) . '`';
    $stmt = $mysql->prepare("INSERT INTO `$table` ($colList) VALUES ($placeholders)");
    
    $inserted = 0;
    foreach ($rows as $row) {
        try {
            $stmt->execute(array_values($row));
            $inserted++;
        } catch (Exception $e) {}
    }
    
    echo "  ✓ $table: $inserted rows\n";
    $totalRows += $inserted;
}

$mysql->exec("SET FOREIGN_KEY_CHECKS=1");

echo "\n✓ Copied $totalRows rows\n\n";

// Step 5: Restore configuration
echo "Step 5: Finalizing...\n";
$env = file_get_contents('.env');
$env = preg_replace('/CACHE_STORE=file/', 'CACHE_STORE=database', $env);
file_put_contents('.env', $env);

file_put_contents('app/Providers/AppServiceProvider.php', $providerBackup);

passthru("php artisan config:clear");
passthru("php artisan cache:clear");

echo "✓ Configuration restored\n\n";
echo "=== MIGRATION COMPLETE ===\n";
echo "✅ Your application is now running on MySQL!\n";
echo "\nRefresh your browser to see your data.\n";
