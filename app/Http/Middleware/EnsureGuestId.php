<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

final class EnsureGuestId
{
    /**
     * Handle an incoming request.
     * Ensure every guest has a persistent UUID in a 1-year cookie.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if guest_id cookie exists
        if (!$request->cookie('guest_id')) {
            // Generate a new UUID for this guest
            $guestId = Str::uuid()->toString();
            
            // Queue the cookie for 1 year (525600 minutes)
            Cookie::queue('guest_id', $guestId, 525600, '/', null, false, false);
        }

        return $next($request);
    }
}
