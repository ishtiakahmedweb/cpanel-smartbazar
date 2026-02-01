<?php
try {
    // Connect to MySQL server without selecting a database
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create the database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS smart_bazaar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database 'smart_bazaar' created or already exists successfully.\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
