<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('administration.pages.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('administration.pages.setting.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'ispublished' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('image')->store('settingImages', 's3');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['image'] = $imagePath;
        } else {

            $validated['image'] = 'assets_home/image1.png';
        }


        $validated['ispublished'] = $request->has('ispublished') ? 1 : 0;
        $validated['url'] = $request->url ;
        // dd($validated['url']);
        Setting::create($validated);
        return redirect()->route('settings.index')->with('success', 'Setting created successfully');
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url|max:255', // Changed to nullable if URL isn't always required
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added max file size (2MB)
            'ispublished' => 'nullable|boolean'
        ]);

        // Handle the boolean field properly
        $validated['ispublished'] = $request->has('ispublished');

        if ($request->hasFile('image')) {
            try {
                // Store the original image
                 // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('image')->store('settingImages', 's3');
            // dd($imagePath);

            $validated['image'] = $imagePath;

              

            } catch (\Exception $e) {
                // If image processing fails, redirect back with error
                return redirect()->back()->with('error', 'Image processing failed: ' . $e->getMessage());
            }
        }

        $setting->update($validated);
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully');
    }

    public function destroy(Setting $setting)
    {
        // Storage::disk('public')->delete($setting->image);
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully');
    }

    public function edit(Setting $setting)
    {
        return view('administration.pages.setting.edit', compact('setting'));
    }
}
