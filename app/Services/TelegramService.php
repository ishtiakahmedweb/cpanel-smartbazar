<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    protected $token;
    protected $chatId;

    public function __construct()
    {
        $telegram = setting('Telegram');
        $this->token = $telegram?->token ?? null;
        $this->chatId = $telegram?->chat_id ?? null;
    }

    /**
     * Send a message to the configured Telegram chat.
     *
     * @param string $message
     * @return bool
     */
    public function sendMessage(string $message): bool
    {
        if (!$this->token || !$this->chatId) {
            Log::warning('Telegram notification skipped: Missing Token or Chat ID.');
            return false;
        }

        try {
            $response = Http::withOptions([
                'verify' => false, // Bypass SSL verification for local/restricted environments
            ])->post("https://api.telegram.org/bot{$this->token}/sendMessage", [
                'chat_id' => $this->chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);

            if ($response->successful()) {
                return true;
            }

            Log::error('Telegram API Error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Telegram Service Exception', [
                'message' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Helper to format order details for Telegram.
     *
     * @param \App\Models\Order $order
     * @return string
     */
    public static function formatOrderMessage($order): string
    {
        $items = "";
        foreach ((array) $order->products as $product) {
            $product = (object) $product;
            $items .= "• " . ($product->name ?? 'N/A') . " x " . ($product->quantity ?? 1) . "\n";
        }

        $total = $order->condition; // This should be the total amount including shipping

        $message = "🔔 *New Order Received!*\n\n";
        $message .= "*Order ID:* #{$order->id}\n";
        $message .= "*Customer:* {$order->name}\n";
        $message .= "*Phone:* {$order->phone}\n";
        $message .= "*Address:* {$order->address}\n\n";
        $message .= "*Items:*\n{$items}\n";
        $message .= "*Total Amount:* ৳" . number_format($total, 2) . "\n";
        $message .= "\nView in Panel: " . route('admin.orders.edit', $order->id);

        return $message;
    }
}
