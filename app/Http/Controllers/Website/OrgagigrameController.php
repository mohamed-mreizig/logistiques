<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Organigrame;
use Illuminate\Http\Request;
use App\Models\Parametre;

class OrgagigrameController extends Controller
{
    public function index()
    //
    {
        $org = Organigrame::where('isPublished', true)
        ->select('orgImgUrl', 'descriptionorgAR','descriptionorgFR' )
        ->first(); 
        // return response()->json($motdirect);  
         return view('homelayout.organigramme.index', ['org' => $org]);
       
    }
}
