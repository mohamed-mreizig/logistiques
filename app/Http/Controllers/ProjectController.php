<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $project = Project::paginate(9); 

        // dd($document[0]->doctype);
        return view('administration.pages.project.index',['documents'=> $project] );
        // return response()->json($parametres);
    }
    public function show($id)
    {
        $projet = Project::findOrFail($id);

    // Return a view or JSON response with the document
        return view('administration.pages.project.edit', compact('projet'));
        // return response()->json($project);
    }
    public function create()
    {
       

        return view('administration.pages.project.create');
    }
    public function store(Request $request)
    {
            
        $validated = $request->validate([
                'titleAr' => 'required|string|max:255',
                'titleFr' => 'required|string|max:255',
                'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
                'descriptionAr' => 'nullable|string',
                'descriptionFR' => 'nullable|string',
                'date_fin' => 'required',
                'date_debut' => 'required',
              
           
        ]);
        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('imgUrl')->store('projetFiles', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($filePath);
            // dd($validated);
        }
        Project::create([
            'imgUrl' => $validated['imgUrl'] ,
           'titleAr' => $validated['titleAr'],
            'titleFr' => $validated['titleFr'],
            'descriptionAr'=> $validated['descriptionAr'],
            'descriptionFR' => $validated['descriptionFR'],
            'date_fin'=> $validated['date_fin'],
            'date_debut'=> $validated['date_debut'],
            
            'created_at'=>now(),
 
            'user_id' => auth()->id(), 
            'isPublished' =>( $request->isPublished == null ? 0 : 1),



        ]);

        return redirect('projet')->with('status','Projet Created Successfully');
    }
    public function update(Request $request,Project $projet)
    {

        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descriptionAr' => 'nullable|string',
            'descriptionFR' => 'nullable|string',
            'date_fin' => 'required',
            'date_debut' => 'required',
             
          
        ]);

        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('imgUrl')->store('projetFiles', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($filePath);
            // dd($validated);
        }
        
        $projet->update([
            'titleAr' => $validated['titleAr']?? $projet->titleAr,
            'titleFr' => $validated['titleFr']?? $projet->titleFr,


            'user_id' => auth()->id(), 
            'isPublished' => $request->has('isPublished')?? 1,
            'imgUrl' => $validated['imgUrl'] ?? $projet->imgUrl,
         
            'updated_at'=>now(),
            'descriptionAr'=> $validated['descriptionAr']?? $projet->descriptionAr,
            'descriptionFR' => $validated['descriptionFR']?? $projet->descriptionFR,
            'date_fin'=> $validated['date_fin']?? $projet->date_fin,
            'date_debut'=> $validated['date_debut']?? $projet->date_debut,
            
            
        ]);
        

        return redirect('projet')->with('status','Projet Updated Successfully');
    }
    public function destroy($id)
    {
        $projet = Project::find($id);
        $projet->delete();
        return redirect('projet')->with('status','projet  Deleted Successfully');
    }
}