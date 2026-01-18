<?php
// app/Http/Controllers/CategoryController.php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\State;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('titles')->get();
        return view('homelayout.categories.index', compact('categories'));
    }
    
    public function showChart($categoryId)
    {
        $category = Category::with(['titles.stateValues.state', 'titles' => function($query) {
            $query->orderBy('name');
        }])->findOrFail($categoryId);
        
        $states = State::orderBy('name')->pluck('name')->toArray();
        
        $chartData = [];
        
        foreach ($category->titles as $title) {
            $titleData = [
                'name' => $title->name,
                'data' => array_fill_keys($states, 0)
            ];
            
            foreach ($title->stateValues as $stateValue) {
                $titleData['data'][$stateValue->state->name] = $stateValue->value;
            }
            
            $chartData[] = $titleData;
        }
        
        return view('homelayout.categories.chart', compact('category', 'chartData', 'states'));
    }
}