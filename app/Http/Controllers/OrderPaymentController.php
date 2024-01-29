<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Order $order)
    {
        return view('payments.create')->with([
            'order' => $order,
            'payment' => $request->get('payment')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        return DB::transaction(function() use ($request, $order){
            //TODO Gestionar pago y comprobar

            $this->cartService->getFromCookie()->services()->detach();

            $order->payment()->create([
                'amount' => $order->total,
                'payment_method' => $request->get('payment'),
                'payed_at' => now(),
            ]);

            $order->status = 'paid';
            $order->save();

            return redirect()
                ->route('main')
                ->withSuccess('Gracias por su compra. Ya puede acceder a configurar su servicio desde el Panel de Usuario');
        }, 3);
    }
}
