<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Historique;
use Illuminate\Http\Request;
use App\Models\Parametre;
use App\Models\Actualite;


class HistoriqueController extends Controller
{
    public function index()
    //
    {
        $histo = Historique::where('isPublished', true)
        ->select('histoAr', 'histoFR', )
        ->first(); 
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        // return response()->json($motdirect);  
         return view('homelayout.historique.index', ['histo' => $histo,'actualites'=> $acualite]);
       
    }
}
