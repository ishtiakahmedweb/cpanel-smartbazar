<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>System Status</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #1a1a1a; color: #0f0; }
        .status { margin: 10px 0; padding: 10px; background: #000; }
        .ok { color: #0f0; }
        .error { color: #f00; }
    </style>
</head>
<body>
    <h1>System Diagnostic</h1>
    <div class="status">
        <strong>Static HTML:</strong> <span class="ok">✓ WORKING</span>
    </div>
    
    <?php
    echo '<div class="status"><strong>PHP:</strong> <span class="ok">✓ WORKING (Version ' . PHP_VERSION . ')</span></div>';
    
    // Check database WITHOUT Laravel
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=smartbaz_laraval', 'smartbaz_admin', 'Dontask007!', [
            PDO::ATTR_TIMEOUT => 3
        ]);
        echo '<div class="status"><strong>Database (localhost):</strong> <span class="ok">✓ CONNECTED</span></div>';
        $localhostWorks = true;
    } catch (Exception $e) {
        echo '<div class="status"><strong>Database (localhost):</strong> <span class="error">✗ FAILED: ' . htmlspecialchars($e->getMessage()) . '</span></div>';
        $localhostWorks = false;
        
        // Try 127.0.0.1
        try {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=smartbaz_laraval', 'smartbaz_admin', 'Dontask007!', [
                PDO::ATTR_TIMEOUT => 3
            ]);
            echo '<div class="status"><strong>Database (127.0.0.1):</strong> <span class="ok">✓ CONNECTED</span></div>';
            echo '<div class="status"><strong>RECOMMENDATION:</strong> <span class="error">Change .env back to DB_HOST=127.0.0.1</span></div>';
        } catch (Exception $e2) {
            echo '<div class="status"><strong>Database (127.0.0.1):</strong> <span class="error">✗ FAILED: ' . htmlspecialchars($e2->getMessage()) . '</span></div>';
            echo '<div class="status"><strong>CRITICAL:</strong> <span class="error">Your MySQL server is DOWN or refusing ALL connections!</span></div>';
        }
    }
    
    // Check Laravel bootstrap
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        echo '<div class="status"><strong>Laravel Vendor:</strong> <span class="ok">✓ EXISTS</span></div>';
    } else {
        echo '<div class="status"><strong>Laravel Vendor:</strong> <span class="error">✗ MISSING</span></div>';
    }
    
    // Check .env
    $envPath = __DIR__ . '/../.env';
    if (file_exists($envPath)) {
        $env = file_get_contents($envPath);
        $dbHost = preg_match('/DB_HOST=(\S+)/', $env, $matches) ? $matches[1] : 'NOT FOUND';
        echo '<div class="status"><strong>.env DB_HOST:</strong> ' . htmlspecialchars($dbHost) . '</div>';
        
        if ($localhostWorks && $dbHost !== 'localhost') {
            echo '<div class="status"><strong>ACTION NEEDED:</strong> <span class="error">Database works with localhost but .env still has ' . htmlspecialchars($dbHost) . '!</span></div>';
            echo '<div class="status">Run: sed -i "s/DB_HOST=.*/DB_HOST=localhost/" ' . dirname(__DIR__) . '/.env</div>';
        }
    }
    
    // Show current directory
    echo '<div class="status"><strong>Current Directory:</strong> ' . htmlspecialchars(__DIR__) . '</div>';
    echo '<div class="status"><strong>Parent Directory:</strong> ' . htmlspecialchars(dirname(__DIR__)) . '</div>';
    ?>
    
    <div class="status">
        <strong>Next Steps:</strong><br>
        1. Go to the parent directory shown above<br>
        2. Run: git pull origin main<br>
        3. Run: php artisan config:clear && php artisan cache:clear && php artisan view:clear<br>
        4. Refresh your homepage
    </div>
</body>
</html>
