<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Doctype;
use App\Models\Event;
use App\Models\ExternalLink;
use App\Models\Indicator;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Ressource;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\Motsdirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        $motdirect = Motsdirect::where('isPublished', true)
        ->select('NameWAr', 'NameWFr', 'descriptionWAr', 'descriptionWFr','imgUrl')
        ->first(); 
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        $event = Event::where('isPublished', true)
        ->get();
        $projet = Project::where('isPublished', true)
        ->take(6)
        ->get();
        $settings = Setting::where('ispublished', true)->get();
        $doc = Doctype::where('isPublished', true)->where('footer', false)->get(); 
        // dd($acualite); 
        // return response()->json($motdirect);  
        $externalLinks = ExternalLink::where('ispublished', true)->get();
        $partners = Partner::where('isPublished', true)->get(); 
        $indicators = Indicator::where('is_published', true)
        ->latest()
        ->take(6)
        ->get();
        
        return view('homelayout.index', ['motdirect' => $motdirect,'actualites'=> $acualite,'events'=> $event,'projects'=> $projet,'doc'=>$doc,'settings'=> $settings,'externalLinks'=> $externalLinks,'partners'=> $partners,'indicators'=> $indicators]);
       
    }
}
