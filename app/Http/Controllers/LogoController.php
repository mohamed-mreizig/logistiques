<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('logos.index', compact('logos'));
    }

    public function create()
    {
        return view('logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|string',
        ]);

        Logo::create($request->all());

        return redirect()->route('logos.index')
            ->with('success', 'Logo created successfully.');
    }

    public function show(Logo $logo)
    {
        return view('logos.show', compact('logo'));
    }

    public function edit(Logo $logo)
    {
        return view('logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|string',
        ]);

        $logo->update($request->all());

        return redirect()->route('logos.index')
            ->with('success', 'Logo updated successfully');
    }

    public function destroy(Logo $logo)
    {
        $logo->delete();

        return redirect()->route('logos.index')
            ->with('success', 'Logo deleted successfully');
    }
}
