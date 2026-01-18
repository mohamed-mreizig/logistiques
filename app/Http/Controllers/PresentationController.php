<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    //
    public function index()
    {
        //apres inch2llh
        //select * from posts;
        // $postsFromDB = Post::all(); //collection object

        //id, title (Var char), description(TEXT), created_at, updated_at ['posts' => $postsFromDB]

        return view('homelayout.presentation.index' );
    }
}
