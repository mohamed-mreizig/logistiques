<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function showUploadForm()
    {
        return view('test.tests3');
    }

    // Handle file upload
    public function upload(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|file', // Max 10MB
        ]);

        // Store the file in S3
        $path = $request->file('file')->store('uploads', 's3');

        // Generate a pre-signed URL for the uploaded file
        $url = Storage::disk('public')->temporaryUrl($path, now()->addMinutes(5));

        // Return the file path and pre-signed URL
        return redirect()->back()->with([
            'success' => 'File uploaded successfully!',
            'path' => $path,
            'url' => $url,
        ]);
    }

    // Display or download a file
    public function showFile($file )
    {
        // Generate a pre-signed URL for the file
        $url = Storage::disk('public')->temporaryUrl('uploads/' . $file, now()->addMinutes(5));

        // Redirect to the pre-signed URL
        return redirect()->away($url);
    }
}
