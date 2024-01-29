<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\CartService;

class ServiceCartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Service $service)
    {
        
        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->services()
            ->find($service->id)->pivot->quantity ?? 0;

        $cart->services()->syncWithoutDetaching([
            $service->id => ['quantity' => $quantity + 1]
        ]);

        $cart->touch();

        $cookie = $this->cartService->makeCookie($cart);

        // TODO De momento volvemos atrás, hay que mandar al carrito cuando este hecho para que pague
        return redirect()->back()->cookie($cookie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service, Cart $cart)
    {
        $cart->services()->detach($service->id);

        $cart->touch();
        
        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }
}
