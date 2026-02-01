<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
    $pdo->exec("DROP DATABASE IF EXISTS smart_bazaar");
    $pdo->exec("CREATE DATABASE smart_bazaar");
    echo "Database 'smart_bazaar' recreated successfully.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
