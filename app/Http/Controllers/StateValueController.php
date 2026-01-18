<?php

namespace App\Http\Controllers;

use App\Models\StateValue;
use App\Models\State;
use App\Models\Title;
use App\Models\Category;
use Illuminate\Http\Request;

class StateValueController extends Controller
{
    /**
     * Affiche la liste des valeurs par état et par titre
     */
    public function index()
    {
        $categories = Category::with('titles')->get();
        $states = State::orderBy('id')->get();
        
        return view('administration.pages.statevalues.index', compact('categories', 'states'));
    }
    
    /**
     * Affiche le formulaire pour éditer les valeurs d'un titre spécifique
     */
    public function edit($titleId)
    {
        $title = Title::findOrFail($titleId);
        $states = State::orderBy('id')->get();
        $stateValues = StateValue::where('title_id', $titleId)->get()->keyBy('state_id');
        
        return view('administration.pages.statevalues.edit', compact('title', 'states', 'stateValues'));
    }
    
    /**
     * Met à jour les valeurs pour un titre spécifique
     */
    public function update(Request $request, $titleId)
    {
        $title = Title::findOrFail($titleId);
        
        $validated = $request->validate([
            'values' => 'required|array',
            'values.*' => 'required|numeric',
        ]);
        
        foreach ($validated['values'] as $stateId => $value) {
            StateValue::updateOrCreate(
                ['title_id' => $titleId, 'state_id' => $stateId],
                ['value' => $value]
            );
        }
        
        return redirect()->route('statevalues.edit', $titleId)
            ->with('success', 'Valeurs mises à jour avec succès.');
    }
}