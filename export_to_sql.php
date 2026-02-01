<?php
/**
 * Export SQLite to MySQL-compatible SQL file
 */

$sqliteDb = __DIR__ . '/database/smart_bazaar.sqlite';
$outputFile = __DIR__ . '/smart_bazaar_mysql_dump.sql';

$sqlite = new PDO("sqlite:$sqliteDb");
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "-- MySQL dump from SQLite\n";
$sql .= "-- Generated: " . date('Y-m-d H:i:s') . "\n\n";
$sql .= "SET FOREIGN_KEY_CHECKS=0;\n";
$sql .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
$sql .= "SET time_zone = \"+00:00\";\n\n";

$tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);

echo "Exporting " . count($tables) . " tables...\n\n";

foreach ($tables as $table) {
    echo "Exporting: $table... ";
    
    $data = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($data)) {
        echo "SKIP (empty)\n";
        continue;
    }
    
    $sql .= "-- Table: $table\n";
    $sql .= "TRUNCATE TABLE `$table`;\n";
    
    foreach ($data as $row) {
        $columns = array_keys($row);
        $values = array_values($row);
        
        // Escape and format values
        $escapedValues = array_map(function($value) {
            if ($value === null) {
                return 'NULL';
            }
            return "'" . addslashes($value) . "'";
        }, $values);
        
        $columnNames = implode('`, `', $columns);
        $valuesList = implode(', ', $escapedValues);
        
        $sql .= "INSERT INTO `$table` (`$columnNames`) VALUES ($valuesList);\n";
    }
    
    $sql .= "\n";
    echo count($data) . " rows\n";
}

$sql .= "SET FOREIGN_KEY_CHECKS=1;\n";

file_put_contents($outputFile, $sql);

echo "\n✅ Export complete!\n";
echo "File saved: $outputFile\n";
echo "\nNext steps:\n";
echo "1. Run: php artisan migrate:fresh --force (with MySQL configured)\n";
echo "2. Import this file via phpMyAdmin or: mysql -u root smart_bazaar < smart_bazaar_mysql_dump.sql\n";
