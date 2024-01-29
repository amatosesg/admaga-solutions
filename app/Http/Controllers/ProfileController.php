<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ConfigureServiceRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit(Request $request){
        return view('profiles.edit')->with([
            'user' => $request->user()
        ]);
    }

    public function update(ProfileRequest $request){
        return DB::transaction(function () use ($request){
            $user = $request->user();

            $user->fill(array_filter($request->validated()));

            if($user->isDirty('email')){
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }

            $user->save();

            if($request->hasFile('image')){
                if($user->image != null){
                    Storage::disk('images')->delete($user->image->path);
                    $user->image->delete();
                }

                $user->image()->create([
                    'path' => $request->image->store('users', 'images'),
                ]);
            }

            return redirect()->route('profiles.edit')->withSuccess('Perfil editado correctamente');
        }, 2);
    }

    public function history(Request $request){
        if(!$request->get('user_id')) $user_id = $request->user()->id;
        else $user_id = $request->get('user_id');

        $orders = Order::where('customer_id', $user_id)->get();

        $userOrders = [];

        foreach($orders as $order){
            $orderAux = [
                'order_id' => $order->id,
                'created_at' => $order->created_at->toDateTimeString(),
                'num_services' => count($order->services),
                'total' => $order->total,
                'status' =>  ($order->status == 'pending') ? 'Pendiente de Pago' : (($order->status == 'paid') ? 'Pagado' : 'Finalizado')
            ];

            $userOrders[] = $orderAux;
        }


        return view('profiles.history')->with([
            'orders' => $userOrders
        ]);
    }

    public function services(Request $request){
        $user_id = $request->user()->id;

        $orders = Order::where('customer_id', $user_id)->where('status', '<>', 'pending')->get();

        $servicesData = [];

        foreach($orders as $order){
            $serviceAux = [
                'order_id' => $order->id,
                'status' => ($order->status == 'paid') ? 'Pendiente' : 'Configurado' 
            ];

            foreach($order->services as $service){
                $serviceAux['service_id'] = $service->id;
                $serviceAux['service_name'] = $service->title;
                $serviceAux['updated_at'] = $service->updated_at->toDateTimeString();
            }

            $servicesData[] = $serviceAux;
        }


        return view('profiles.services')->with([
            'services' => $servicesData
        ]);
    }

    public function configure(Request $request){
        $os = explode('-', $request->get('os'));
        $order_id = $os[0];
        $service_id = $os[1];

        return view('profiles.configure.services')->with([
            'order_id' => $order_id,
            'service_id' => $service_id
        ]);
    }

    public function setup(ConfigureServiceRequest $request){
        dd($request);
        return DB::transaction(function () use ($request){
            $user = $request->user();

            $user->fill(array_filter($request->validated()));

            if($user->isDirty('email')){
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }

            $user->save();

            if($request->hasFile('image')){
                if($user->image != null){
                    Storage::disk('images')->delete($user->image->path);
                    $user->image->delete();
                }

                $user->image()->create([
                    'path' => $request->image->store('enterprises', 'images'),
                ]);
            }

            return redirect()->route('profiles.edit')->withSuccess('Perfil editado correctamente');
        }, 2);
    }
}
