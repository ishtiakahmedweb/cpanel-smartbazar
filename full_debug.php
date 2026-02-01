<?php
echo "=== DEBUG MIGRATION ===\n";

// 1. Reset Database
$pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
$pdo->exec("DROP DATABASE IF EXISTS smart_bazaar");
$pdo->exec("CREATE DATABASE smart_bazaar");
echo "1. Database reset.\n";

// 2. Run migrations
echo "2. Running migrations...\n";
exec("php artisan migrate --force 2>&1", $output, $return);
echo implode("\n", $output) . "\n";
echo "Migration return code: $return\n";

// 3. Check products table
echo "\n3. Checking products table indexes:\n";
$pdo->exec("USE smart_bazaar");
$stmt = $pdo->query("SHOW INDEX FROM products");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "   Index: {$row['Key_name']} | Column: {$row['Column_name']}\n";
}

echo "\n4. Checking users table indexes:\n";
$stmt = $pdo->query("SHOW INDEX FROM users");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "   Index: {$row['Key_name']} | Column: {$row['Column_name']}\n";
}
