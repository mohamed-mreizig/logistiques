<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    //
    public function serveFile($filename)
    {
        // Define the file path in S3
        // $path=urldecode($filename);
        $path = 'uploads/' .$filename;
        // dd($path);
        // Check if the file exists
        if (Storage::disk('public')->exists($path)) {
        dd("hun1");

            $file = Storage::disk('public')->get($path);
            // Get the file from S3
            $mimeType = Storage::disk('public')->mimeType($path);
        }else{

            if (Storage::disk('public')->exists($path)) {

                $file =Storage::disk('public')->temporaryUrl($path, now()->addMinutes(5));
                // Get the file from S3
                $mimeType = Storage::disk('public')->mimeType($path);
            }

        }




        // Return the file as a response
        return redirect()->away($file);
    }
}
