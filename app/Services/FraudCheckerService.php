<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FraudCheckerService
{
    private string $apiKey = '80f352303fe08a0088c91e205c3b78c4';
    private string $apiUrl = 'https://fraudchecker.link/api/v1/qc/';

    /**
     * Check fraud history for a given phone number
     *
     * @param string $phone
     * @return array
     */
    public function checkPhone(string $phone): array
    {
        // Normalize phone number (remove +88, 88 prefix, keep 11 digits)
        $phone = $this->normalizePhone($phone);

        // Check cache first (24 hour cache to save API credits)
        $cacheKey = 'fraud_check_' . $phone;
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $response = Http::asForm()->post($this->apiUrl, [
                'api_key' => $this->apiKey,
                'phone' => $phone,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Add calculated fields
                $data['success_rate'] = $this->calculateSuccessRate($data);
                $data['risk_level'] = $this->getRiskLevel($data['success_rate']);
                
                // Cache for 24 hours
                Cache::put($cacheKey, $data, now()->addHours(24));
                
                return $data;
            } else {
                Log::error('Fraud Checker API Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                
                return [
                    'error' => 'Failed to fetch fraud data. Status: ' . $response->status(),
                ];
            }
        } catch (\Exception $e) {
            Log::error('Fraud Checker Exception', [
                'message' => $e->getMessage(),
                'phone' => $phone,
            ]);
            
            return [
                'error' => 'Failed to connect to fraud checker service: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Normalize phone number to 11-digit format
     *
     * @param string $phone
     * @return string
     */
    private function normalizePhone(string $phone): string
    {
        // Remove any non-digit characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Remove country code if present
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = substr($phone, 2);
        } elseif (strlen($phone) == 12 && str_starts_with($phone, '88')) {
            $phone = substr($phone, 2);
        }
        
        return $phone;
    }

    /**
     * Calculate success rate percentage
     *
     * @param array $data
     * @return float
     */
    private function calculateSuccessRate(array $data): float
    {
        $total = $data['total_parcels'] ?? 0;
        
        if ($total == 0) {
            return 0;
        }
        
        $delivered = $data['total_delivered'] ?? 0;
        
        return round(($delivered / $total) * 100, 2);
    }

    /**
     * Get risk level based on success rate
     *
     * @param float $successRate
     * @return string
     */
    private function getRiskLevel(float $successRate): string
    {
        if ($successRate >= 80) {
            return 'low'; // Green - Good customer
        } elseif ($successRate >= 60) {
            return 'medium'; // Yellow - Moderate risk
        } else {
            return 'high'; // Red - High risk
        }
    }

    /**
     * Clear cache for a specific phone number
     *
     * @param string $phone
     * @return void
     */
    public function clearCache(string $phone): void
    {
        $phone = $this->normalizePhone($phone);
        Cache::forget('fraud_check_' . $phone);
    }
}
