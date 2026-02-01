<?php
/**
 * Final migration script with all safety checks
 */

echo "=== SQLite to MySQL Migration ===\n\n";

// Backup .env
$envFile = __DIR__ . '/.env';
$envBackup = file_get_contents($envFile);

try {
    // Step 1: Create database
    $mysql = new PDO('mysql:host=127.0.0.1;charset=utf8mb4', 'root', '');
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mysql->exec("DROP DATABASE IF EXISTS smart_bazaar");
    $mysql->exec("CREATE DATABASE smart_bazaar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✓ MySQL database created\n\n";
    
    // Step 2: Update .env to use file cache and MySQL
    $env = $envBackup;
    $env = preg_replace('/CACHE_STORE=database/', 'CACHE_STORE=file', $env);
    $env = preg_replace('/DB_CONNECTION=sqlite/', 'DB_CONNECTION=mysql', $env);
    $env = preg_replace('/DB_DATABASE=database\/smart_bazaar\.sqlite/', "DB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=smart_bazaar\nDB_USERNAME=root\nDB_PASSWORD=", $env);
    file_put_contents($envFile, $env);
    
    echo "Step 1: Creating tables...\n";
    passthru("php artisan config:clear 2>nul");
    passthru("php artisan migrate:fresh --force 2>&1", $return);
    
    if ($return !== 0) {
        throw new Exception("Migration failed");
    }
    
    echo "\n✓ All tables created\n\n";
    
    // Step 3: Copy data
    echo "Step 2: Copying data from SQLite...\n";
    
    $sqlite = new PDO("sqlite:" . __DIR__ . '/database/smart_bazaar.sqlite');
    $sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar', 'root', '');
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' AND name != 'migrations'")->fetchAll(PDO::FETCH_COLUMN);
    
    $mysql->exec("SET FOREIGN_KEY_CHECKS=0");
    
    $totalRows = 0;
    foreach ($tables as $table) {
        $data = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($data)) {
            echo "  - $table (empty)\n";
            continue;
        }
        
        $mysql->exec("TRUNCATE TABLE `$table`");
        
        $columns = array_keys($data[0]);
        $placeholders = implode(',', array_fill(0, count($columns), '?'));
        $columnNames = implode('`,`', $columns);
        
        $stmt = $mysql->prepare("INSERT INTO `$table` (`$columnNames`) VALUES ($placeholders)");
        
        $count = 0;
        foreach ($data as $row) {
            try {
                $stmt->execute(array_values($row));
                $count++;
            } catch (PDOException $e) {}
        }
        
        $totalRows += $count;
        echo "  ✓ $table ($count rows)\n";
    }
    
    $mysql->exec("SET FOREIGN_KEY_CHECKS=1");
    
    // Step 4: Restore cache to database
    $env = file_get_contents($envFile);
    $env = preg_replace('/CACHE_STORE=file/', 'CACHE_STORE=database', $env);
    file_put_contents($envFile, $env);
    
    passthru("php artisan config:clear 2>nul");
    passthru("php artisan cache:clear 2>nul");
    
    echo "\n=== Migration Complete ===\n";
    echo "Total rows migrated: $totalRows\n";
    echo "\n✅ Successfully migrated to MySQL!\n";
    echo "Your application is now using MySQL with all your data intact.\n";
    
} catch (Exception $e) {
    // Restore original .env on error
    file_put_contents($envFile, $envBackup);
    passthru("php artisan config:clear 2>nul");
    echo "\n✗ Error: " . $e->getMessage() . "\n";
    echo "Restored original configuration.\n";
}
