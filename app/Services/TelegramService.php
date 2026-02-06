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
        if (!$this->token) {
            throw new \Exception('Telegram Bot Token is missing.');
        }
        if (!$this->chatId) {
            throw new \Exception('Telegram Chat ID is missing.');
        }

        try {
            $response = Http::withOptions([
                'verify' => false,
            ])->post("https://api.telegram.org/bot{$this->token}/sendMessage", [
                'chat_id' => $this->chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
            ]);

            if ($response->successful()) {
                return true;
            }

            $error = $response->json('description') ?? $response->body();
            Log::error('Telegram API Error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new \Exception("Telegram API Error: " . $error);
        } catch (\Exception $e) {
            Log::error('Telegram Service Exception', [
                'message' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    public static function formatOrderMessage($order): string
    {
        $items = "";
        $products = is_string($order->products) ? json_decode($order->products, true) : $order->products;
        foreach ((array) ($products ?? []) as $product) {
            $product = (object) $product;
            $name = htmlspecialchars($product->name ?? 'N/A');
            $qty = $product->quantity ?? 1;
            $items .= "• " . $name . " x " . $qty . "\n";
        }

        $data = is_string($order->data) ? json_decode($order->data, true) : $order->data;
        $subtotal = (float) ($data['subtotal'] ?? 0);
        $shipping = (float) ($data['shipping_cost'] ?? 0);
        $discount = (float) ($data['discount'] ?? 0) + (float) ($data['retail_discount'] ?? 0);
        $total = ($subtotal + $shipping) - $discount;

        $name = htmlspecialchars($order->name);
        $phone = htmlspecialchars($order->phone);
        $address = htmlspecialchars($order->address);

        $message = "🔔 <b>New Order Received!</b>\n\n";
        $message .= "<b>Order ID:</b> #{$order->id}\n";
        $message .= "<b>Customer:</b> {$name}\n";
        $message .= "<b>Phone:</b> {$phone}\n";
        $message .= "<b>Address:</b> {$address}\n\n";
        $message .= "<b>Items:</b>\n{$items}\n";
        $message .= "<b>Total Amount:</b> ৳" . number_format($total, 2) . "\n";
        $message .= "\n<a href=\"" . url('/admin/orders/' . $order->id . '/edit') . "\">View in Panel</a>";

        return $message;
    }
}
