<?php
// Show REAL errors from homepage
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');
echo "Testing Laravel Bootstrap...\n";

try {
    require __DIR__ . '/../vendor/autoload.php';
    echo "✓ Autoload works\n\n";
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    echo "✓ Bootstrap works\n\n";
    
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "✓ Kernel created\n\n";
    
    $request = Illuminate\Http\Request::capture();
    echo "✓ Request captured\n\n";
    
    echo "Attempting to handle homepage request...\n\n";
    $response = $kernel->handle($request);
    
    echo "Response status: " . $response->getStatusCode() . "\n\n";
    
    if ($response->getStatusCode() === 500) {
        echo "===== ERROR RESPONSE CONTENT =====\n\n";
        echo $response->getContent();
        echo "\n\n===== END ERROR CONTENT =====\n";
    } else {
        echo "✓ Homepage loaded successfully!\n";
    }
    
} catch (Throwable $e) {
    echo "❌ ERROR FOUND:\n\n";
    echo "Message: " . $e->getMessage() . "\n\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
