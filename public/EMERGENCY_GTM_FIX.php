<?php
// EMERGENCY GTM FIX - NO DEPENDENCIES
// Upload this file to your public_html folder and visit it once

$host = 'localhost';
$db   = 'smartbaz_laraval';
$user = 'smartbaz_admin';
$pass = 'Dontask007!';

$correctId = "GTM-G4CS8XYV";
$headScript = "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','$correctId');</script>
<!-- End Google Tag Manager -->";

$noscript = "<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=$correctId\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->";

header('Content-Type: text/plain; charset=utf-8');
echo "=== EMERGENCY GTM FIX ===\n\n";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Update gtm_code
    $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_code'");
    $stmt->execute(['val' => json_encode($headScript)]);
    echo "✓ Updated gtm_code\n";
    
    // Update gtm_noscript
    $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_noscript'");
    $stmt->execute(['val' => json_encode($noscript)]);
    echo "✓ Updated gtm_noscript\n";
    
    // Update gtm_id
    $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_id'");
    $stmt->execute(['val' => json_encode($correctId)]);
    echo "✓ Updated gtm_id\n";
    
    echo "\n✓✓✓ DATABASE UPDATED SUCCESSFULLY ✓✓✓\n";
    echo "\nNow clearing caches...\n";
    
    // Clear cache files
    $cacheDir = __DIR__ . '/../bootstrap/cache';
    if (is_dir($cacheDir)) {
        $files = glob($cacheDir . '/*');
        foreach ($files as $file) {
            if (is_file($file) && basename($file) !== '.gitignore') {
                unlink($file);
            }
        }
        echo "✓ Cleared bootstrap cache\n";
    }
    
    $frameworkCache = __DIR__ . '/../storage/framework/cache';
    if (is_dir($frameworkCache)) {
        $files = glob($frameworkCache . '/data/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        echo "✓ Cleared framework cache\n";
    }
    
    echo "\n✓✓✓ ALL DONE! ✓✓✓\n";
    echo "\nYour site is now using GTM ID: $correctId\n";
    echo "Test GTM Preview mode now - it should connect!\n";
    echo "\n⚠️ You can delete this file now for security.\n";
    
} catch (PDOException $e) {
    echo "❌ DATABASE ERROR: " . $e->getMessage() . "\n";
    echo "\nTrying with 127.0.0.1 instead...\n\n";
    
    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=$db;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_code'");
        $stmt->execute(['val' => json_encode($headScript)]);
        echo "✓ Updated gtm_code\n";
        
        $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_noscript'");
        $stmt->execute(['val' => json_encode($noscript)]);
        echo "✓ Updated gtm_noscript\n";
        
        $stmt = $pdo->prepare("UPDATE settings SET value = :val WHERE name = 'gtm_id'");
        $stmt->execute(['val' => json_encode($correctId)]);
        echo "✓ Updated gtm_id\n";
        
        echo "\n✓✓✓ DONE! ✓✓✓\n";
    } catch (PDOException $e2) {
        echo "❌ FAILED: " . $e2->getMessage() . "\n";
        echo "\n⚠️ Your database is not accepting connections right now.\n";
        echo "Please try again in a few seconds.\n";
    }
}
