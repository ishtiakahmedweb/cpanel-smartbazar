<?php
// Import SQL dump into MySQL
$sqlFile = __DIR__ . '/smart_bazaar_mysql_dump.sql';

if (!file_exists($sqlFile)) {
    die("SQL dump file not found!\n");
}

echo "Importing data into MySQL...\n\n";

$mysql = new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar;charset=utf8mb4', 'root', '');
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = file_get_contents($sqlFile);

// Split by statement and execute
$statements = array_filter(array_map('trim', explode(";\n", $sql)));

$success = 0;
$failed = 0;

foreach ($statements as $statement) {
    if (empty($statement) || strpos($statement, '--') === 0) {
        continue;
    }
    
    try {
        $mysql->exec($statement);
        $success++;
    } catch (PDOException $e) {
        $failed++;
        if (strpos($e->getMessage(), 'Duplicate entry') === false) {
            echo "Warning: " . substr($statement, 0, 50) . "... - " . $e->getMessage() . "\n";
        }
    }
}

echo "\n✅ Import complete!\n";
echo "Successful: $success statements\n";
if ($failed > 0) {
    echo "Skipped: $failed statements (likely duplicates)\n";
}
