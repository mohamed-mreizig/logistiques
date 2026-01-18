<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Motsdirect;

class DirecterController extends Controller
{
    //
    public function index()
    {
        $motdirect = Motsdirect::where('isPublished', true)
        ->select('NameWAr', 'NameWFr', 'descriptionWAr', 'descriptionWFr','imgUrl')
        ->first(); 
      
        // dd($acualite); 
        // return response()->json($motdirect);  
         return view('homelayout.motdirect.index', ['motdirect' => $motdirect]);
       
    }
}
