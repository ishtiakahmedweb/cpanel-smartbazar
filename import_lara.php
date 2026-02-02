<?php
// SmartBazar LOCAL DB IMPORT SCRIPT

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'smartbaz_v2';
$sqlFile = __DIR__ . '/lara.sql';

if (!file_exists($sqlFile)) {
    die("Error: lara.sql not found!\n");
}

echo "--- IMPORTING DATABASE: $db ---\n";

try {
    // 1. Create DB if not exists
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo " - Database '$db' ensured.\n";

    // 2. Connect to DB
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Read and execute SQL
    echo " - Reading lara.sql...\n";
    $sql = file_get_contents($sqlFile);
    
    // Simple splitting by semicolon. Note: This is a basic approach.
    // Large files might need line-by-line processing.
    $statements = array_filter(array_map('trim', explode(";\n", $sql)));
    
    echo " - Executing " . count($statements) . " statements...\n";
    $success = 0;
    
    foreach ($statements as $statement) {
        if (empty($statement) || str_starts_with($statement, '--') || str_starts_with($statement, '/*')) {
            continue;
        }
        try {
            $pdo->exec($statement);
            $success++;
        } catch (PDOException $e) {
            // Ignore common duplicate errors for re-runs
            if (!str_contains($e->getMessage(), 'already exists') && !str_contains($e->getMessage(), 'Duplicate')) {
                echo "Warning on: " . substr($statement, 0, 50) . " : " . $e->getMessage() . "\n";
            }
        }
    }

    echo "--- IMPORT COMPLETE ($success successful statements) ---\n";

} catch (Exception $e) {
    die("ERROR: " . $e->getMessage() . "\n");
}
