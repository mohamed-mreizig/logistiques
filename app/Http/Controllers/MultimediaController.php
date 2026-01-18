<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Storage;

class MultimediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::query();
    
        // Apply type filter if provided
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }
    
        // Order by ID
        $query->orderBy('id', 'desc');
    
        // Paginate results (10 items per page)
        $mediaItems = $query->paginate(10)->withQueryString();
    
        return view('administration.pages.multimedia.index', compact('mediaItems'));
    }

    public function create()
    {
        return view('administration.pages.multimedia.create');
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('administration.pages.multimedia.edit', compact('media'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',

            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi',
            'type' => 'required|in:image,video'
        ]);
        if ($request->hasFile('file')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('file')->store('mediaFiles', 's3');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['file'] = $imagePath;
        }


        Media::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $validated['file'],
            'type' => $request->type,
            'isPublished' => ($request->isPublished == null ? 0 : 1),
        ]);

        return redirect('multimedia')->with('status', 'Media Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',

            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi',
            'type' => 'required|in:image,video'
        ]);

        if ($request->hasFile('file')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('file')->store('mediaFiles', 's3');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['file'] = $imagePath;
            $media->path = $validated['file'];
        }

        $media->title = $request->title;
        $media->description = $request->description;
        $media->type = $request->type;
        $media->isPublished = $request->isPublished;
        $media->save();
        return redirect('multimedia')->with('status', 'Media Updated Successfully');
    }

    public function destroy( $id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect('multimedia')->with('success', 'Media deleted successfully');
    }
}
