<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Spatie\GoogleTagManager\GoogleTagManagerFacade;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CheckoutRequest $request)
    {
        if ($request->isMethod('GET')) {
            return view('checkout');
        }

        return redirect()->route('checkout');
    }
}
