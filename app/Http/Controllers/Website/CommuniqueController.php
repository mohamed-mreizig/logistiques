<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Communique;
use Illuminate\Http\Request;

class CommuniqueController extends Controller
{
    //
    public function index()
    {
        // $missions = Mission::all();
        $mission = Communique::where('isPublished', true)->first();
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        // return response()->json($missions);
         return view('homelayout.communique.index', ['mission' => $mission,'actualites'=> $acualite]);
       
    }
}
