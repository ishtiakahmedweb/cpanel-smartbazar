<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Http;

echo "--- Telegram Detailed Debug ---\n";

$telegram = setting('Telegram');
if (!$telegram) {
    echo "❌ Error: setting('Telegram') returned NULL. Settings are not saved in DB.\n";
    exit;
}

$token = $telegram->token ?? null;
$chatId = $telegram->chat_id ?? null;

echo "Token: " . ($token ? substr($token, 0, 10) . "..." : "MISSING") . "\n";
echo "Chat ID: " . ($chatId ?: "MISSING") . "\n";

if (!$token) {
    echo "❌ Error: Token is missing.\n";
    exit;
}

echo "\n--- Step 1: Testing Token (getMe) ---\n";
try {
    $response = Http::withOptions(['verify' => false])->get("https://api.telegram.org/bot{$token}/getMe");
    if ($response->successful()) {
        $data = $response->json();
        echo "✅ Token is VALID. Bot Name: " . ($data['result']['first_name'] ?? 'Unknown') . "\n";
        echo "Bot Username: @" . ($data['result']['username'] ?? 'Unknown') . "\n";
    } else {
        echo "❌ Token is INVALID. Status: " . $response->status() . "\n";
        echo "Response: " . $response->body() . "\n";
        exit;
    }
} catch (\Exception $e) {
    echo "❌ Connection Error: " . $e->getMessage() . "\n";
    exit;
}

if (!$chatId) {
    echo "❌ Error: Chat ID is missing. Set it in the Admin panel.\n";
    exit;
}

echo "\n--- Step 2: Testing Message Delivery (sendMessage) ---\n";
try {
    $message = "⚡ <b>Debug Test</b>\nTime: " . date('Y-m-d H:i:s');
    $response = Http::withOptions(['verify' => false])->post("https://api.telegram.org/bot{$token}/sendMessage", [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
    ]);

    if ($response->successful()) {
        echo "✅ Message SENT successfully! Check your phone.\n";
    } else {
        echo "❌ Message FAILED. Status: " . $response->status() . "\n";
        echo "Response: " . $response->body() . "\n";
        
        if (str_contains($response->body(), 'chat not found')) {
            echo "👉 TIP: This Chat ID is wrong or you haven't started the bot. Search for the bot and click START.\n";
        }
    }
} catch (\Exception $e) {
    echo "❌ Connection Error during send: " . $e->getMessage() . "\n";
}

echo "\n--- Debug Finished ---\n";
