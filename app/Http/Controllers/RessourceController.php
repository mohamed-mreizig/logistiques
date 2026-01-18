<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RessourceController extends Controller
{
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $project = Ressource::get();

        // dd($document[0]->doctype);
        return view('administration.pages.ressource.index',['documents'=> $project] );
        // return response()->json($parametres);
    }
    public function show($id)
    {
        $projet = Ressource::findOrFail($id);

    // Return a view or JSON response with the document
        return view('administration.pages.ressource.edit', compact('projet'));
        // return response()->json($project);
    }
    public function create()
    {
       

        return view('administration.pages.ressource.create');
    }
    public function store(Request $request)
    {
            
        $validated = $request->validate([
                'titleAr' => 'required|string|max:255',
                'titleFr' => 'required|string|max:255',
                'linkurl' =>'nullable|string',
                'descriptionAr' => 'nullable|string',
                'descriptionFr' => 'nullable|string',
              
        ]);
        Ressource::create([
            'linkurl' => $validated['linkurl'] ,
           'titleAr' => $validated['titleAr'],
            'titleFr' => $validated['titleFr'],
            'descriptionAr'=> $validated['descriptionAr'],
            'descriptionFr' => $validated['descriptionFr'],
            'created_at' => now(),
            'user_id' => auth()->id(), 
            'isPublished' =>( $request->isPublished == null ? 0 : 1),



        ]);

        return redirect('ressource')->with('status','Ressource Created Successfully');
    }
    public function update(Request $request,Ressource $ressource)
    {

        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'linkurl' =>'string',
            'descriptionAr' => 'nullable|string',
            'descriptionFr' => 'nullable|string',
          
        ]);
        $ressource->update([
            'titleAr' => $validated['titleAr']?? $ressource->titleAr,
            'titleFr' => $validated['titleFr']?? $ressource->titleFr,

            'updated_at'=> now(),
            'user_id' => auth()->id(), 
            'isPublished' => $request->isPublished ,
            'linkurl' => $validated['linkurl'] ?? $ressource->linkurl,
           
            'descriptionAr'=> $validated['descriptionAr']?? $ressource->descriptionAr,
            'descriptionFr' => $validated['descriptionFr']?? $ressource->descriptionFr,
          
            
            
        ]);

        return redirect('ressource')->with('status','ressource Updated Successfully');
    }
    public function destroy($id)
    {
        $ressource = Ressource::find($id);
        $ressource->delete();
        return redirect('ressource')->with('status','ressource  Deleted Successfully');
    }
}