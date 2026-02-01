<?php
$m=new PDO('mysql:host=127.0.0.1;dbname=smart_bazaar','root','');
echo "MySQL Verification:\n";
echo "Products: " . $m->query('SELECT COUNT(*) FROM products')->fetchColumn() . "\n";
echo "Orders: " . $m->query('SELECT COUNT(*) FROM orders')->fetchColumn() . "\n";
echo "Users: " . $m->query('SELECT COUNT(*) FROM users')->fetchColumn() . "\n";
echo "Settings: " . $m->query('SELECT COUNT(*) FROM settings')->fetchColumn() . "\n";
