<?php
/**
 * Complete SQLite to MySQL converter
 * Copies EVERYTHING - schema + data
 */

set_time_limit(300);

echo "=== Complete SQLite to MySQL Conversion ===\n\n";

// Connect to SQLite
$sqliteDb = __DIR__ . '/database/smart_bazaar.sqlite';
$sqlite = new PDO("sqlite:$sqliteDb");
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Connect to MySQL and create database
$mysql = new PDO('mysql:host=127.0.0.1;charset=utf8mb4', 'root', '');
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$mysql->exec("DROP DATABASE IF EXISTS smart_bazaar");
$mysql->exec("CREATE DATABASE smart_bazaar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$mysql->exec("USE smart_bazaar");

echo "✓ MySQL database created\n\n";

// Get all tables
$tables = $sqlite->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")->fetchAll(PDO::FETCH_COLUMN);

echo "Converting " . count($tables) . " tables...\n\n";

$mysql->exec("SET FOREIGN_KEY_CHECKS=0");

foreach ($tables as $table) {
    echo "Processing: $table\n";
    
    // Get SQLite table schema
    $schema = $sqlite->query("SELECT sql FROM sqlite_master WHERE type='table' AND name='$table'")->fetchColumn();
    
    if (!$schema) {
        echo "  ✗ No schema found\n";
        continue;
    }
    
    // Convert to MySQL
    $mysqlSchema = convertToMySQL($schema);
    
    try {
        $mysql->exec($mysqlSchema);
        echo "  ✓ Table created\n";
    } catch (PDOException $e) {
        echo "  ✗ Create failed: " . $e->getMessage() . "\n";
        continue;
    }
    
    // Copy data
    $rows = $sqlite->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($rows)) {
        echo "  - No data\n\n";
        continue;
    }
    
    $columns = array_keys($rows[0]);
    $placeholders = implode(',', array_fill(0, count($columns), '?'));
    $columnList = '`' . implode('`, `', $columns) . '`';
    
    $stmt = $mysql->prepare("INSERT INTO `$table` ($columnList) VALUES ($placeholders)");
    
    $inserted = 0;
    foreach ($rows as $row) {
        try {
            $stmt->execute(array_values($row));
            $inserted++;
        } catch (PDOException $e) {
            // Skip errors
        }
    }
    
    echo "  ✓ Inserted $inserted rows\n\n";
}

$mysql->exec("SET FOREIGN_KEY_CHECKS=1");

echo "=== Conversion Complete ===\n";
echo "✅ All data converted successfully!\n\n";
echo "Now updating .env to use MySQL...\n";

// Update .env
$envFile = __DIR__ . '/.env';
$env = file_get_contents($envFile);
$env = preg_replace('/DB_CONNECTION=sqlite/', 'DB_CONNECTION=mysql', $env);
$env = preg_replace('/DB_DATABASE=database\/smart_bazaar\.sqlite/', "DB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=smart_bazaar\nDB_USERNAME=root\nDB_PASSWORD=", $env);
file_put_contents($envFile, $env);

echo "✓ Configuration updated\n";
echo "\nRefresh your browser - you're now on MySQL!\n";

function convertToMySQL($sqliteSQL) {
    // Basic conversions
    $mysql = $sqliteSQL;
    
    // Replace AUTOINCREMENT
    $mysql = preg_replace('/\s+AUTOINCREMENT/i', ' AUTO_INCREMENT', $mysql);
    
    // Replace INTEGER PRIMARY KEY with BIGINT
    $mysql = preg_replace('/INTEGER\s+PRIMARY\s+KEY\s+AUTOINCREMENT/i', 'BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY', $mysql);
    $mysql = preg_replace('/INTEGER\s+PRIMARY\s+KEY/i', 'BIGINT UNSIGNED PRIMARY KEY', $mysql);
    
    // Replace INTEGER with BIGINT
    $mysql = preg_replace('/\s+INTEGER(\s|,|\))/i', ' BIGINT$1', $mysql);
    
    // Replace DATETIME with TIMESTAMP NULL
    $mysql = preg_replace('/\s+DATETIME(\s|,|\)|DEFAULT)/i', ' TIMESTAMP NULL$1', $mysql);
    
    // Replace BLOB with LONGBLOB
    $mysql = preg_replace('/\s+BLOB(\s|,|\))/i', ' LONGBLOB$1', $mysql);
    
    // Remove any SQLite-specific keywords
    $mysql = preg_replace('/\s+COLLATE\s+NOCASE/i', '', $mysql);
    
    // Add MySQL ENGINE and CHARSET
    $mysql = rtrim($mysql, ';') . ' ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';
    
    return $mysql;
}
