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
        $cookieName = 'page_tracked_' . $page->id . '_24h';
        if (! $request->cookie($cookieName) && GoogleTagManagerFacade::isEnabled()) {
            GoogleTagManagerFacade::set([
                'event' => 'page_view',
                'page_type' => 'page',
                'content' => $page->toArray(),
            ]);
            \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
        }

        return view('page');
    }
}
