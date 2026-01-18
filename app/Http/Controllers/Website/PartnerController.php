<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::where('isPublished', true)->get();
        return view('homelayout.partners.index', compact('partners'));
    }
}