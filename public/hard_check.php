<?php
// HARD DIAGNOSTIC - NO LARAVEL
header('Content-Type: text/plain');
echo "HARD DB CHECK\n";

$host = '127.0.0.1';
$db   = 'smartbaz_laraval';
$user = 'smartbaz_admin';
$pass = 'Dontask007!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5
    ]);
    
    $stmt = $pdo->query("SELECT value FROM settings WHERE name = 'gtm_code' LIMIT 1");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "DB_GTM_CODE: " . ($row['value'] ?? 'NOT FOUND') . "\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    
    // Try Localhost if 127 fails
    try {
        echo "Retrying via localhost...\n";
        $pdo = new PDO("mysql:host=localhost;dbname=$db;charset=utf8mb4", $user, $pass);
        $stmt = $pdo->query("SELECT value FROM settings WHERE name = 'gtm_code' LIMIT 1");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "DB_GTM_CODE (localhost): " . ($row['value'] ?? 'NOT FOUND') . "\n";
    } catch (Exception $ee) {
        echo "HARD ERROR: " . $ee->getMessage() . "\n";
    }
}
echo "\nDONE";
