<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Service;
use App\Models\Servicetype;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index(Request $request, $type)
    //
    {
       
        // dd($type);
        $types = Servicetype::findOrFail($type);
        $doc =  Service::where('servicetype_id',  $type)->paginate(8); 
        // dd(vars: $doc);
        // return response()->json($doc);  
         return view('homelayout.service.index',['services' => $doc, 'types' => $types] );
       
    }
    public function edit(Request $request,$service){
        $service = Service::where('id', $service)->first();
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        // dd($service);

        return view('homelayout.service.details', ['service' => $service,'actualites'=> $acualites]);
    }
}
