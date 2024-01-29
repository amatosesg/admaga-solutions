<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(EnterpriseRequest $request)
    {
        return DB::transaction(function() use ($request) {

            $enterprise = Enterprise::create([
                'name' => $request->get('name'),
                'bbdd_name' => strtolower(str_replace(' ', '_', $request->get('bbdd_name'))),
                'url_name' => strtolower(str_replace(' ', '-', $request->get('url_name'))),
                'order_id' => $request->get('o')
            ]);

            $enterprise->save();

            $order = Order::find($request->get('o'));
            $order->status = 'shipped';
            $order->save();

            return redirect()->route('profiles.services')->withSuccess("Se ha configurado y creado la empresa {$enterprise->name} correctamente");
        });
    }
}
