<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mission;
use App\Models\Actualite;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $missions = Mission::all();
        $mission = Mission::where('isPublished', true)->first();
        $acualite = Actualite::where('isPublished', true)
        ->orderBy('id', 'desc') 
        ->take(4)
        ->get();
        // return response()->json($missions);
         return view('homelayout.presentation.index', ['mission' => $mission,'actualites'=> $acualite]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'descriptionAr' => 'required|string',
            'descriptionFr' => 'required|string',
            'objective_id' => 'nullable|integer',
            'isPublished' => 'boolean',
        ]);

        $mission = Mission::create($validated);

        return response()->json($mission, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        return response()->json($mission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        $validated = $request->validate([
            'titleAr' => 'sometimes|string|max:255',
            'titleFr' => 'sometimes|string|max:255',
            'descriptionAr' => 'sometimes|string',
            'descriptionFr' => 'sometimes|string',
            'mission_id' => 'nullable|integer',
            'isPublished' => 'boolean',
        ]);

        $mission->update($validated);

        return response()->json($mission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();

        return response()->json(['message' => 'Mission deleted successfully']);
    }
}
