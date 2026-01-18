<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Parametre;

class ContactController extends Controller
{
    //
    public function index()
    //
    {
        $contact = Contact::where('isPublished', true)
        ->select('telephone', 'adressAr','adressFR','boitePostaleFR','boitePostaleAR','longe','alt','email' )
        ->first(); 
        // return response()->json($motdirect);  
         return view('homelayout.contact.index',['contact' => $contact] );
       
    }
}
