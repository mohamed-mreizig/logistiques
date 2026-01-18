<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::orderBy('id')->get();
        return view('administration.pages.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.pages.states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:states',
        ]);

        State::create($validated);

        return redirect()->route('states.index')
            ->with('success', 'État créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return view('administration.pages.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('administration.pages.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:states,name,'.$state->id,
        ]);

        $state->update($validated);

        return redirect()->route('states.index')
            ->with('success', 'État mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')
            ->with('success', 'État supprimé avec succès.');
    }
}
