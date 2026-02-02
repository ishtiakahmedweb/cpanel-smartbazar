<?php

namespace App\CacheProfiles;

use Illuminate\Http\Request;
use Spatie\ResponseCache\CacheProfiles\CacheAllSuccessfulGetRequests;
use Symfony\Component\HttpFoundation\Response;

class SmartBazarCacheProfile extends CacheAllSuccessfulGetRequests
{
    public function shouldCacheResponse(Response $response): bool
    {
        if (! parent::shouldCacheResponse($response)) {
            return false;
        }

        // 🛑 DO NOT CACHE IF DATABASE ERRORS OR PHP WARNINGS ARE PRESENT
        $content = $response->getContent();
        if (str_contains($content, 'SQLSTATE') || str_contains($content, 'Warning:')) {
            return false;
        }

        return true;
    }
}
