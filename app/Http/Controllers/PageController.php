<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Page $page)
    {
        if (GoogleTagManagerFacade::isEnabled()) {
            $cookieName = 'page_tracked_' . $page->id . '_24h';
            $shieldEnabled = setting('data_layer_shield');

            if (! $shieldEnabled || ! $request->cookie($cookieName)) {
                GoogleTagManagerFacade::set([
                    'event' => 'page_view',
                    'eventID' => generateEventId(),
                    'page_type' => 'page',
                    'page_title' => $page->title,
                    'url' => $request->fullUrl(),
                    'page_location' => $request->fullUrl(),
                    'content' => $page->toArray(),
                ]);

                if ($shieldEnabled) {
                    \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
                }
            }
        }

        return view('page');
    }
}
