<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    //
    public function publicIndex()
{
    $indicators = Indicator::where('is_published', true)
                         ->orderBy('created_at', 'desc')
                         ->get();
    
    return view('homelayout.indicators.index', compact('indicators'));
}
}
