<?php

namespace App\Http\Controllers;

use App\Models\Communique;
use Illuminate\Http\Request;
use Redirect;

class ComuniqueController extends Controller
{
    public function index(){
        $mission = Communique::where('isPublished', true)->first()?? Communique::latest('id')->first();

        // dd($parametres->id);
        return view('administration.pages.comunique.index', compact('mission'));
    }
    public function updatecomunique(Request $request, $id = 'new')
    {
        $validated = $request->validate([
           
            'titleAr'=> 'nullable|string',
        'titleFr'=> 'nullable|string',
        'descriptionWAr'=> 'nullable|string',
        'descriptionWFr'=> 'nullable|string',
            

        ]);
        if ($id !== 'new') {
         
            $mission = Communique::findOrFail($id);
            $mission->isPublished = false;
            $mission->updated_at = now();
        }
        $newParametre = Communique::create([
        
            'titleAr' =>  $validated['titleAr'] ??  $mission->titleAr, // Preserve old histoAr
            'titleFr' =>  $validated['titleFr'] ?? $mission->titleFr, // Preserve old histoFR
            'descriptionWAr' => $validated['descriptionWAr'] ?? $mission->descriptionWAr, // Preserve old logoUrl
            'descriptionWFr' => $validated['descriptionWFr'] ?? $mission->descriptionWFr, // Preserve old logoUrl
            'created_at' => now(),
            'updated_at' => null,
            'isPublished' => $request->has('isPublished'),
             // Set updated_at to current time
            'user_id' => auth()->id(), 
        ]);
        if ($id !== 'new') {
            $mission->save();
        }
    
            return Redirect::route('comunique.index', )->with('status', 'communique-updated');
   
    }

}
