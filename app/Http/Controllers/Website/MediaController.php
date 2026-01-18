<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function index()
    {
        $mediaItems = Media::where('isPublished', true)->get(); 
        return view('homelayout.multimedia.index', compact('mediaItems'));
    }
}
