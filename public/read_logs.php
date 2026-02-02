<?php
header('Content-Type: text/plain; charset=utf-8');
$logPath = __DIR__ . '/../storage/logs/laravel.log';

if (file_exists($logPath)) {
    echo "--- LAST 100 LINES OF LARAVEL LOG ---\n\n";
    $lines = file($logPath);
    $lastLines = array_slice($lines, -100);
    echo implode("", $lastLines);
} else {
    echo "Log file not found at: " . $logPath;
}
