<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    //
    public function index()
    //
    {
        $actualite = Actualite::where('isPublished', true)
        ->paginate(8);
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        return view('homelayout.actualite.index', ['actual' => $actualite,'actualites'=> $acualites]);

        //  return view('homelayout.contact.index',['contact' => $contact] );
       
    }
    public function edit(Actualite $actualite){
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();

        return view('homelayout.actualite.details', ['actual' => $actualite,'actualites'=> $acualites]);
    }
}
