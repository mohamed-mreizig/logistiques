<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Politique;
use Illuminate\Http\Request;

class PolitiqueController extends Controller
{
    // 
    public function index()
    {
        // $missions = Mission::all();
        $mission = Politique::where('isPublished', true)->first();
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        // return response()->json($missions);
         return view('homelayout.politique.index', ['mission' => $mission,'actualites'=> $acualite]);
       
    }
}
