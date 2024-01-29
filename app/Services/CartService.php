<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName;
    protected $cookieTime;

    public function __construct(){
        $this->cookieName = config('cart.cookie.name');
        $this->cookieTime = config('cart.cookie.expiration');
    }

    public function getFromCookie(){
        $cartID = Cookie::get($this->cookieName);

        $cart = Cart::find($cartID);
        
        return $cart;
    }

    public function getFromCookieOrCreate(){
        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart){
        return Cookie::make($this->cookieName, $cart->id, $this->cookieTime);
    }

    public function countProducts(){
        $cart = $this->getFromCookie();

        if($cart != null){
            return $cart->services->pluck('pivot.quantity')->sum();
        }

        return 0;
    }
}