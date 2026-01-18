<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Actualite;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    //
    {
        $event = Event::where('isPublished', true)
        ->paginate(8);
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        return view('homelayout.event.index', ['events' => $event,'actualites'=> $acualites]);

        //  return view('homelayout.contact.index',['contact' => $contact] );
       
    }
    public function edit(Event $event){
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();

        return view('homelayout.event.details', ['event' => $event,'actualites'=> $acualites]);
    }
}
