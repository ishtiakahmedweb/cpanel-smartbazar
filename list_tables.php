<?php
try {
    $db = new PDO('sqlite:f:/Smartbazar/Smartbazar-V2-main/Laravel-test/database/database.sqlite');
    $stmt = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Table: " . $row['name'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
