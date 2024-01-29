<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PanelService;
use App\Models\Order;
use App\Models\User;
use App\Http\Requests\ServiceRequest;
use App\Scopes\AvailableScope;

class ServiceController extends Controller
{
    public function index(){
        $services = PanelService::all();

        return view('services.index')->with([
            'services' => $services
        ]);
    }

    public function show(PanelService $service){
        return view('services.show')->with([
            'service' => $service
        ]);;
    }

    public function create(){
        return view('services.create');
    }

    public function update(ServiceRequest $request, PanelService $service){
        $service->update($request->all());

        return redirect()
            ->route('services.index')
            ->withSuccess("The service with id {$service->id} was modified");
    }

    public function destroy(PanelService $service){
        $service->delete();

        return redirect()
            ->route('services.index')
            ->withSuccess("The service with id {$service->id} was deleted");
    }

    public function edit(PanelService $service){
        return view('services.edit')->with([
            'service' => $service
        ]);
    }

    public function store(ServiceRequest $request){
        $service = PanelService::create($request->all());

        return redirect()
            ->route('services.index')
            ->withSuccess("The new service with id {$service->id} was created");
    }

    public function active(){

        $orders = Order::where('status', '<>', 'pending')->get();

        $services = [];

        foreach($orders as $order){
            $customer_id = $order->customer_id;

            $serviceData = [
                'order_id' => $order->id,
                'customer_id' => $customer_id,
                'customer_name' => User::find($customer_id)->name,
                'status' => ($order->status == 'paid') ?  'Pendiente' : 'Configurado'
            ];

            foreach($order->services as $service){
                $serviceData['service_id'] = $service->id;
                $serviceData['quantity'] = $service->pivot->quantity;

                $services[] = $serviceData;
            }
        }

        return view('services.active')->with([
            'services' => $services
        ]);
    }
}
