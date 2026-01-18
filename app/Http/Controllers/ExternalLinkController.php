<?php

namespace App\Http\Controllers;

use App\Models\ExternalLink;
use Illuminate\Http\Request;

class ExternalLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = ExternalLink::all();
        return view('administration.pages.externallink.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.pages.externallink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $validated['ispublished'] = $request->has('ispublished');
        ExternalLink::create($validated);
        return redirect()->route('externallinks.index')->with('success', 'Link created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExternalLink $externalLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExternalLink $externallink)
    {
        return view('administration.pages.externallink.edit', compact('externallink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExternalLink $externallink)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $validated['ispublished'] = $request->has('ispublished');
        $externallink->update($validated);
        return redirect()->route('externallinks.index')->with('success', 'Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExternalLink $externallink)
    {
        $externallink->delete();
        return redirect()->route('externallinks.index')->with('success', 'Link deleted successfully');
    }
}
