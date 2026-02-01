<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar', 'root', '');
    echo "Connected to MySQL database 'smart_bazaar' successfully.\n";
    
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (count($tables) > 0) {
        echo "Found " . count($tables) . " tables:\n";
        foreach ($tables as $table) {
            echo "- $table\n";
        }
    } else {
        echo "Database is connected but EMPTY (0 tables).\n";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
