<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FraudCheckerService
{
    private string $apiKey = 'bdc_pRxn6PBVqiFYLfgt7LfXaeAqAdwStSAGyTlhsOUE9kwuMc6BWdZ2hbOntGsK';
    private string $apiUrl = 'https://api.bdcourier.com/courier-check';

    /**
     * Check fraud history for a given phone number
     *
     * @param string $phone
     * @return array
     */
    public function checkPhone(string $phone): array
    {
        // Normalize phone number (ensure 11 digits for BD numbers)
        $phone = $this->normalizePhone($phone);
        $apiKey = trim($this->apiKey);

        // Check cache first (24 hour cache to save API credits)
        $cacheKey = 'fraud_check_' . $phone;
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // BDCourier API requires JSON body and Bearer token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ])->post($this->apiUrl, [
                'phone' => $phone,
            ]);

            if ($response->successful()) {
                $result = $response->json();
                
                if (isset($result['status']) && $result['status'] === 'success') {
                    $data = $result['data'] ?? [];
                    
                    // BDCourier structure: data -> { phone, couriers: [] }
                    // We need to normalize this to our internal structure if possible
                    // or just return as is if the frontend is adjusted
                    
                    // Add calculated fields for our UI
                    $data['success_rate'] = $this->calculateSuccessRate($data);
                    $data['risk_level'] = $this->getRiskLevel($data['success_rate']);
                    
                    // Cache for 24 hours
                    Cache::put($cacheKey, $data, now()->addHours(24));
                    
                    return $data;
                }
                
                return [
                    'error' => 'API returned unsuccessful status: ' . ($result['message'] ?? 'Unknown error'),
                ];
            } else {
                $errorBody = $response->body();
                Log::error('BDCourier API Error', [
                    'status' => $response->status(),
                    'body' => $errorBody,
                    'phone' => $phone,
                ]);
                
                return [
                    'error' => 'Failed to fetch data from BDCourier. Status: ' . $response->status(),
                ];
            }
        } catch (\Exception $e) {
            Log::error('BDCourier Exception', [
                'message' => $e->getMessage(),
                'phone' => $phone,
            ]);
            
            return [
                'error' => 'Failed to connect to BDCourier service: ' . $e->getMessage(),
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
        
        // Handle common BD formats
        if (str_starts_with($phone, '880')) {
            $phone = substr($phone, 2);
        } elseif (str_starts_with($phone, '0')) {
            // Already starts with 0
        } elseif (strlen($phone) == 10 && str_starts_with($phone, '1')) {
            $phone = '0' . $phone;
        }
        
        // Final fallback: take the last 11 digits if longer
        if (strlen($phone) > 11) {
            $phone = substr($phone, -11);
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
        // BDCourier might provide statistics in the couriers array
        // We'll calculate a global rate if possible
        $total = 0;
        $delivered = 0;
        
        if (isset($data['couriers']) && is_array($data['couriers'])) {
            foreach ($data['couriers'] as $courier) {
                $total += $courier['total_parcels'] ?? 0;
                $delivered += $courier['total_delivered_parcels'] ?? ($courier['delivered'] ?? 0);
            }
        } else {
            // Fallback to top-level fields if they exist
            $total = $data['total_parcels'] ?? 0;
            $delivered = $data['total_delivered'] ?? 0;
        }
        
        if ($total == 0) {
            return 0;
        }
        
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
            return 'low';
        } elseif ($successRate >= 60) {
            return 'medium';
        } else {
            return 'high';
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
