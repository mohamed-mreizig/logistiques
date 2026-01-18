<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctype;

use App\Models\Ressource;
use App\Models\Servicetype;
class SitemapController extends Controller
{
    //
    public function index()
    {
        $sharedVar = Doctype::where('isPublished', true)->get();
        $serviceVar = Servicetype::where('isPublished', true)->get();
        $ressource = Ressource::where('isPublished', true)->get();
// dd($sharedVar);
        return view('administration.pages.sitemap.index', compact('serviceVar', 'sharedVar', 'ressource'));
    }
}
