<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('administration.pages.social.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('administration.pages.social.create');
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'platform' => 'string|max:255',
            'url' => 'string|max:255',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'isPublished' => 'nullable|boolean'
        ]);
     

        if ($request->hasFile('icon')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('icon')->store('iconImages', 's3');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['icon'] = $imagePath;
        }
       
        $validated['ispublished'] = $request->has('ispublished') ? 1 : 0;
        SocialLink::create([
            'platform' => $validated['platform'],
            'url' => $validated['url'],
            'icon' => $validated['icon'],
            'isPublished' => $validated['isPublished']
        ]);

        return redirect()->route('social.index')->with('success', 'Social link created successfully');
    }

    public function edit($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        return view('administration.pages.social.edit', compact('socialLink'));
    }

    public function update(Request $request, $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isPublished' => 'nullable|boolean'
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('iconImages', 's3');
            $validated['icon'] = $path;
        }

        $validated['isPublished'] = $request->isPublished;

        $socialLink->update($validated);

        return redirect()->route('social.index')->with('success', 'Social link updated successfully');
    }

    public function destroy($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();
        return redirect()->route('social.index')->with('success', 'Social link deleted successfully');
    }
}