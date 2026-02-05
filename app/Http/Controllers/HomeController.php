<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        abort_if(isOninda() && ! config('app.resell'), 403);

        if (GoogleTagManagerFacade::isEnabled()) {
            $cookieName = 'home_tracked_24h';
            $shieldEnabled = setting('data_layer_shield');

            if (! $shieldEnabled || ! $request->cookie($cookieName)) {
                GoogleTagManagerFacade::set([
                    'event' => 'page_view',
                    'eventID' => generateEventId(),
                    'page_type' => 'home',
                    'url' => $request->fullUrl(),
                    'page_location' => $request->fullUrl(),
                ]);

                if ($shieldEnabled) {
                    \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
                }
            }
        }

        return view('index');
    }
}
