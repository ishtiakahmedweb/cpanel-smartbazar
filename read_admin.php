<?php
try {
    $db = new PDO('sqlite:f:/Smartbazar/Smartbazar-V2-main/Laravel-test/database/smart_bazaar.sqlite');
    $stmt = $db->query('SELECT email FROM admins LIMIT 5');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Email: " . $row['email'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
