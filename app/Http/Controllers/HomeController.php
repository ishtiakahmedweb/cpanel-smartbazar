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

        $cookieName = 'home_tracked_24h';
        if (! $request->cookie($cookieName) && GoogleTagManagerFacade::isEnabled()) {
            GoogleTagManagerFacade::set([
                'event' => 'page_view',
                'page_type' => 'home',
            ]);
            \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
        }

        return view('index');
    }
}
