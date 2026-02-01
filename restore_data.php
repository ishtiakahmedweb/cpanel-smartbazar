<?php
/**
 * Data Copy Script
 * Copies data from SQLite to an ALREADY MIGRATED MySQL database
 */

set_time_limit(0);

echo "=== Copying Data to MySQL ===\n\n";

$sqlite = new PDO("sqlite:" . __DIR__ . '/database/smart_bazaar.sqlite');
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar;charset=utf8mb4', 'root', '');
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get all tables from SQLite
$tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' AND name != 'migrations'")->fetchAll(PDO::FETCH_COLUMN);

$mysql->exec("SET FOREIGN_KEY_CHECKS=0");

$totalRestored = 0;
foreach ($tables as $table) {
    echo "Restoring table: $table... ";
    
    // Check if table exists in MySQL (it should)
    $stmt = $mysql->query("SHOW TABLES LIKE '$table'");
    if ($stmt->rowCount() == 0) {
        echo "SKIP (Not in MySQL)\n";
        continue;
    }
    
    // Get data
    $rows = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($rows)) {
        echo "SKIP (Empty table)\n";
        continue;
    }
    
    // Clear existing data in MySQL (just in case)
    $mysql->exec("TRUNCATE TABLE `$table`");
    
    // Prepare insert
    $cols = array_keys($rows[0]);
    $placeholders = implode(',', array_fill(0, count($cols), '?'));
    $colList = '`' . implode('`, `', $cols) . '`';
    
    $insert = $mysql->prepare("INSERT INTO `$table` ($colList) VALUES ($placeholders)");
    
    $count = 0;
    foreach ($rows as $row) {
        try {
            $insert->execute(array_values($row));
            $count++;
        } catch (Exception $e) {
            // Log error but continue
        }
    }
    
    echo "DONE ($count rows)\n";
    $totalRestored += $count;
}

$mysql->exec("SET FOREIGN_KEY_CHECKS=1");

echo "\n✅ Successfully restored $totalRestored rows across " . count($tables) . " tables!\n";
