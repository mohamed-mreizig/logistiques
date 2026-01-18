<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index()
    {
        $indicators = Indicator::get();
        return view('administration.pages.indicators.index', compact('indicators'));
    }

    public function create()
    {
        return view('administration.pages.indicators.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'value' => 'required|numeric',
            'icon' => 'required|string|max:255',
            'is_published' => 'boolean',

        ]);

        Indicator::create($validated);

        return redirect()->route('indicators.index')->with('success', 'Indicator created successfully');
    }

    public function edit(Indicator $indicator)
    {
        return view('administration.pages.indicators.edit', compact('indicator'));
    }

    public function update(Request $request, Indicator $indicator)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'value' => 'required|numeric',
            'icon' => 'required|string|max:255',
        ]);
        $validated['is_published'] = $request->has('is_published');

        

        $indicator->update($validated);

        return redirect()->route('indicators.index')->with('success', 'Indicator updated successfully');
    }

    public function destroy(Indicator $indicator)
    {
        $indicator->delete();
        return redirect()->route('indicators.index')->with('success', 'Indicator deleted successfully');
    }

    
}