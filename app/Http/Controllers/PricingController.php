<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class PricingController extends Controller
{
    public function index(){
        // Temporal cogemos los 3 primeros, no tenemos ni las ventajas ni los que queremos mostrar
        $services = Service::all()->slice(0,3);
        return view('pricing.index')->with([
            'services' => $services
        ]);
    }
}
