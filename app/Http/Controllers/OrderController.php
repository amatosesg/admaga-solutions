<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();

        if(!isset($cart) || $cart->services->isEmpty()){
            return redirect()
                ->back()
                ->withErrors('El carrito esta vacío');
        }

        return view('orders.create')->with([
            'cart' => $cart,
            'cart_quantity' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        return DB::transaction(function() use ($request) {
            $user = $request->user();

            $paymentMethod = $request->input('payment-method');
    
            $order = $user->orders()->create([
                'status' => 'pending'
            ]);
    
            $cart = $this->cartService->getFromCookie();
    
            $cartServicesList = $cart->services->mapWithKeys(function($service){
                $element[$service->id] = ['quantity' => $service->pivot->quantity];
    
                return $element;
            });
    
            $order->services()->attach($cartServicesList->toArray());
    
            return redirect()->route('orders.payments.create', ['payment' => $paymentMethod, 'order' => $order]);
        });
    }
}
