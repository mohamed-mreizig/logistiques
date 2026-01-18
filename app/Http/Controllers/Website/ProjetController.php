<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Actualite;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    //
    public function index()
    //
    {
        $projet = Project::where('isPublished', true)
        ->paginate(6);
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        return view('homelayout.projet.index', ['projets' => $projet,'actualites'=> $acualites]);

        //  return view('homelayout.contact.index',['contact' => $contact] );
       
    }
    public function edit( $project){
        $project = Project::where('id', $project)->firstOrFail();
        // dd($project);

        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();

        return view('homelayout.projet.details', ['projet' => $project,'actualites'=> $acualites]);
    }

}
