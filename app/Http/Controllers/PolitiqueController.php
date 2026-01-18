<?php

namespace App\Http\Controllers;

use App\Models\Politique;
use Illuminate\Http\Request;
use Redirect;

class PolitiqueController extends Controller
{
    //
    public function index(){
        $mission = Politique::where('isPublished', true)->first()?? Politique::latest('id')->first();

        // dd($parametres->id);
        return view('administration.pages.politique.index', compact('mission'));
    }
    public function updatepolitiquead(Request $request, $id = 'new')
    {
        $validated = $request->validate([
           
        'titleAr'=> 'nullable|string',
        'titleFr'=> 'nullable|string',
        'descriptionWAr'=> 'nullable|string',
        'descriptionWFr'=> 'nullable|string',
            

        ]);
        if ($id !== 'new') {
         
            $mission = Politique::findOrFail($id);
            $mission->isPublished = false;
            $mission->updated_at = now();
        }
        $newParametre = Politique::create([
        
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
    
            return Redirect::route('politiquead.index', )->with('status', 'politique-updated');
   
    }
}
