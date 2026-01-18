<?php

namespace App\Http\Controllers;

use App\Models\Mooc;
use Illuminate\Http\Request;

class MoocController extends Controller
{
    public function index()
    {
        $moocs = Mooc::all();
        return view('administration.pages.mooc.index', compact('moocs'));
    }

    public function create()
    {
        return view('administration.pages.mooc.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'titleAr' => 'required|string',
            'titleFr' => 'required|string',
            'descriptionAr' => 'required|string',
            'descriptionFr' => 'required|string',
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg,gif',
            'isPublished' => 'nullable|boolean'
        ]);

        if ($request->hasFile('imageUrl')) {
            $imagePath = $request->file('imageUrl')->store('moocImages', 's3');
            $validated['imageUrl'] = $imagePath;
        }

        $validated['isPublished'] = $request->has('isPublished');
        $validated['user_id'] = auth()->id();

        Mooc::create($validated);

        return redirect()->route('mooc.index')->with('success', 'MOOC created successfully');
    }

    public function edit($id)
    {
        $mooc = Mooc::findOrFail($id);
        return view('administration.pages.mooc.edit', compact('mooc'));
    }

    public function update(Request $request, $id)
    {
        $mooc = Mooc::findOrFail($id);
        
        $validated = $request->validate([
            'titleAr' => 'required|string',
            'titleFr' => 'required|string',
            'descriptionAr' => 'required|string',
            'descriptionFr' => 'required|string',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isPublished' => 'nullable|boolean'
        ]);

        if ($request->hasFile('imageUrl')) {
            $imagePath = $request->file('imageUrl')->store('moocImages', 's3');
            $validated['imageUrl'] = $imagePath;
        }

        $validated['isPublished'] = $request->has('isPublished');
        $mooc->update($validated);

        return redirect()->route('mooc.index')->with('success', 'MOOC updated successfully');
    }

    public function destroy($id)
    {
        $mooc = Mooc::findOrFail($id);
        $mooc->delete();
        return redirect()->route('mooc.index')->with('success', 'MOOC deleted successfully');
    }
}