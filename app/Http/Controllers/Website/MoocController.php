<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Mooc;
use Illuminate\Http\Request;

class MoocController extends Controller
{
    public function index()
    {
        $moocs = Mooc::where('isPublished', true)->paginate(9);
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        return view('homelayout.mooc.index', ['moocs' => $moocs,'actualites'=> $acualites]);
    }

    public function show($id)
    {
        $mooc = Mooc::findOrFail($id);
        $acualites = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        return view('homelayout.mooc.edit', ['mooc' => $mooc,'actualites'=> $acualites]);
    }
}