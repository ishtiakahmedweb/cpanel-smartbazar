<?php
/**
 * Migrate all data from SQLite to MySQL
 */

// SQLite connection
$sqliteDb = __DIR__ . '/database/smart_bazaar.sqlite';
$sqlite = new PDO("sqlite:$sqliteDb");
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// MySQL connection
$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar;charset=utf8mb4', 'root', '');
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Connected to both databases successfully.\n\n";

// Get all tables from SQLite
$tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);

echo "Found " . count($tables) . " tables to migrate.\n\n";

// Disable foreign key checks
$mysql->exec("SET FOREIGN_KEY_CHECKS=0");

foreach ($tables as $table) {
    echo "Migrating table: $table... ";
    
    try {
        // Check if table exists in MySQL
        $tableExists = $mysql->query("SHOW TABLES LIKE '$table'")->rowCount() > 0;
        if (!$tableExists) {
            echo "SKIP (table doesn't exist in MySQL)\n";
            continue;
        }
        
        // Get data from SQLite
        $data = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($data)) {
            echo "SKIP (empty)\n";
            continue;
        }
        
        // Clear existing data in MySQL
        $mysql->exec("TRUNCATE TABLE `$table`");
        
        // Insert data into MySQL
        $columns = array_keys($data[0]);
        $placeholders = implode(',', array_fill(0, count($columns), '?'));
        $columnNames = implode('`,`', $columns);
        
        $stmt = $mysql->prepare("INSERT INTO `$table` (`$columnNames`) VALUES ($placeholders)");
        
        $count = 0;
        foreach ($data as $row) {
            $stmt->execute(array_values($row));
            $count++;
        }
        
        echo "DONE ($count rows)\n";
        
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
    }
}

// Re-enable foreign key checks
$mysql->exec("SET FOREIGN_KEY_CHECKS=1");

echo "\n✅ Migration complete!\n";
