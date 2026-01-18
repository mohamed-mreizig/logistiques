<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Document;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    //

    public function index(){
        $countDoc = Document::count();
        $countAct = Actualite::count();
        $countEvn = Event::count();
        $countProj = Project::count();
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        $event = Event::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(6)
        ->get();
        // dd($countDoc);
        return view('administration.pages.administration.index',
         ['doc'=>$countDoc , 'act'=>$countAct, 'Evn'=>$countEvn ,'Proj'=>$countProj,'actualites'=> $acualite, 'events'=> $event ]);
    }


}
