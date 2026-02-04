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

        // Check cache first (using v4 prefix to clear old stale data)
        $cacheKey = 'fraud_check_v4_' . $phone;
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // BDCourier PHP example uses x-www-form-urlencoded
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ])->post($this->apiUrl, [
                'phone' => $phone,
            ]);

            if ($response->successful()) {
                $result = $response->json();
                
                // Log the raw response for debugging (will show in Laravel logs)
                Log::info('BDCourier API Success', [
                    'phone' => $phone,
                    'response' => $result
                ]);
                if (isset($result['status']) && $result['status'] === 'success') {
                    $data = $result['data'] ?? [];
                    
                    // Add calculated fields for our UI
                    $data['normalized_phone'] = $phone;
                    $data['raw_response'] = $result; // Pass raw for frontend troubleshooting if needed
                    $data['success_rate'] = $this->calculateSuccessRate($data);
                    $data['risk_level'] = $this->getRiskLevel($data['success_rate'], $data);
                    
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
                    'error' => 'Failed to fetch data from BDCourier. Status: ' . $response->status() . '. Details: ' . ($errorBody ?: 'No response body'),
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
        } elseif (str_starts_with($phone, '88')) {
            $phone = '0' . substr($phone, 2);
        } elseif (str_starts_with($phone, '0')) {
            // Already starts with 0
        } elseif (strlen($phone) == 10 && str_starts_with($phone, '1')) {
            $phone = '0' . $phone;
        }
        
        // Final fallback: take the last 11 digits if longer
        if (strlen($phone) > 11) {
            $phone = substr($phone, -11);
        }
        
        // Ensure it starts with 0 and is exactly 11 digits
        if (strlen($phone) == 11 && !str_starts_with($phone, '0')) {
             // If we have 11 digits but it doesn't start with 0 (e.g. accidentally stripped too much)
             // this is a safeguard
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
        
        if (isset($data['summary']) && is_array($data['summary'])) {
            $total = $data['summary']['total_parcel'] ?? $data['summary']['total_parcels'] ?? 0;
            $delivered = $data['summary']['success_parcel'] ?? $data['summary']['total_delivered'] ?? 0;
        } elseif (isset($data['couriers']) && is_array($data['couriers'])) {
            foreach ($data['couriers'] as $courier) {
                $total += $courier['total_parcels'] ?? $courier['total_parcel'] ?? $courier['total'] ?? $courier['orders'] ?? 0;
                $delivered += $courier['total_delivered_parcels'] ?? $courier['total_delivered'] ?? $courier['delivered'] ?? $courier['success'] ?? 0;
            }
        } else {
            // Fallback: maybe it's an associative array where each key is a courier (except summary/normalized_phone/raw_response)
            foreach ($data as $key => $value) {
                if (is_array($value) && !in_array($key, ['summary', 'normalized_phone', 'raw_response', 'reports'])) {
                    $total += $value['total_parcel'] ?? $value['total_parcels'] ?? 0;
                    $delivered += $value['success_parcel'] ?? $value['total_delivered'] ?? 0;
                }
            }

            // Fallback to top-level if still 0
            if ($total === 0) {
                $total = $data['total_parcels'] ?? $data['total_parcel'] ?? $data['total_orders'] ?? $data['total'] ?? 0;
                $delivered = $data['total_delivered'] ?? $data['total_delivered_parcels'] ?? $data['delivered'] ?? $data['success'] ?? 0;
            }
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
    private function getRiskLevel(float $successRate, array $data = []): string
    {
        // Re-calculate totals to ensure we have a basis
        $total = 0;
        if (isset($data['summary']) && is_array($data['summary'])) {
            $total = $data['summary']['total_parcel'] ?? $data['summary']['total_parcels'] ?? 0;
        } elseif (isset($data['couriers']) && is_array($data['couriers'])) {
            foreach ($data['couriers'] as $courier) {
                $total += $courier['total_parcels'] ?? $courier['total_parcel'] ?? 0;
            }
        } else {
            // Check associative courier keys
            foreach ($data as $key => $value) {
                if (is_array($value) && !in_array($key, ['summary', 'normalized_phone', 'raw_response', 'reports', 'success_rate', 'risk_level'])) {
                    $total += $value['total_parcel'] ?? $value['total_parcels'] ?? 0;
                }
            }
            if ($total === 0) {
                $total = $data['total_parcels'] ?? $data['total_parcel'] ?? 0;
            }
        }

        if ($total === 0) {
            return 'low'; // Or 'unknown' if we add UI support, for now 'low' is less alarming
        }

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
