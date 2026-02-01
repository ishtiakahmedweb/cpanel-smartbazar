<?php
echo "=== DEBUG MIGRATION ===\n";

$logFile = 'full_debug.log';
file_put_contents($logFile, "=== DEBUG MIGRATION LOG ===\n");

// 1. Reset Database
$pdo = new PDO('mysql:host=127.0.0.1', 'root', '');
$pdo->exec("DROP DATABASE IF EXISTS smart_bazaar");
$pdo->exec("CREATE DATABASE smart_bazaar");
file_put_contents($logFile, "1. Database reset.\n", FILE_APPEND);

// 2. Run migrations
file_put_contents($logFile, "2. Running migrations...\n", FILE_APPEND);
exec("php artisan migrate --force 2>&1", $output, $return);
file_put_contents($logFile, implode("\n", $output) . "\n", FILE_APPEND);
file_put_contents($logFile, "Migration return code: $return\n", FILE_APPEND);

// 3. Check products table
file_put_contents($logFile, "\n3. Checking products table indexes:\n", FILE_APPEND);
$pdo->exec("USE smart_bazaar");
$stmt = $pdo->query("SHOW INDEX FROM products");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    file_put_contents($logFile, "   Index: {$row['Key_name']} | Column: {$row['Column_name']}\n", FILE_APPEND);
}

echo "Done. See $logFile\n";
