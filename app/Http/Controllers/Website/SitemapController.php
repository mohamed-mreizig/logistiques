<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Doctype;

use App\Models\Ressource;
use App\Models\Servicetype;

class SitemapController extends Controller
{
    public function index()
    {
        $sharedVar = Doctype::where('isPublished', true);
        $serviceVar = Servicetype::where('isPublished', true)->get();
        $ressource = Ressource::where('isPublished', true)->get();

        return view('homelayout.sitemap.index', compact('serviceVar', 'sharedVar', 'ressource'));
    }
}