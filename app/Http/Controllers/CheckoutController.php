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
            $cookieName = 'bt_tracked_24h';
            $alreadyTracked = $request->cookie($cookieName);

            if (! $alreadyTracked && GoogleTagManagerFacade::isEnabled()) {
                GoogleTagManagerFacade::set([
                    'event' => 'begin_checkout',
                    'ecommerce' => [
                        'currency' => 'BDT',
                        'value' => cart()->subTotal(),
                        'items' => cart()->content()->map(fn ($product): array => [
                            'item_id' => $product->id,
                            'item_name' => $product->name,
                            'item_category' => $product->options->category,
                            'price' => $product->price,
                            'quantity' => $product->qty,
                        ])->values(),
                    ],
                ]);

                // Set cookie for 24 hours (1440 minutes) to prevent duplicate begin_checkout
                \Illuminate\Support\Facades\Cookie::queue($cookieName, '1', 1440);
            }

            return view('checkout');
        }

        return redirect()->route('checkout');
    }
}
