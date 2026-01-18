<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ActualiteController extends Controller


{
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $posts = Actualite::paginate(6); // 9 items per page

        // dd($document[0]->doctype);
        return view('administration.pages.actualite.index',['actualites'=> $posts] );
        // return response()->json($parametres);
    }
    public function show($id)
    {
        $projet = Actualite::findOrFail($id);

    // Return a view or JSON response with the document
        return view('administration.pages.actualite.edit', compact('projet'));
        // return response()->json($project);
    }
    public function create()
    {
       

        return view('administration.pages.actualite.create');
    }
    public function store(Request $request)
    {
            
        $validated = $request->validate([
                'titleAR' => 'required|string|max:255',
                'titleFR' => 'required|string|max:255',
                'imgUrl' =>'nullable',
                'descriptionAR' => 'nullable|string',
                'descriptionFR' => 'nullable|string',
              
        ]);
        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('imgUrl')->store('actualiteImg', 'public');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($imagePath);
        }
        Actualite::create([
            'imgUrl' => $validated['imgUrl'] ,
           'titleAR' => $validated['titleAR'],
            'titleFR' => $validated['titleFR'],
            'descriptionAR'=> $validated['descriptionAR'],
            'descriptionFR' => $validated['descriptionFR'],
            
            'user_id' => auth()->id(), 
            'isPublished' =>( $request->isPublished == null ? 0 : 1),
            'created_at'=>now()
        ]);

        return redirect('actualite')->with('status','Actualite Created Successfully');
    }
    public function update(Request $request,Actualite $actualite)
    {

        $validated = $request->validate([
            'titleAR' => 'required|string|max:255',
            'titleFR' => 'required|string|max:255',
            'imgUrl' =>'nullable',
            'descriptionAR' => 'nullable|string',
            'descriptionFR' => 'nullable|string',
          
        ]);
        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('imgUrl')->store('actualiteImg', 'public');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($imagePath);
        }
        $actualite->update([
            'titleAR' => $validated['titleAR']?? $actualite->titleAR,
            'titleFR' => $validated['titleFR']?? $actualite->titleFR,
            'imgUrl' => $validated['imgUrl']?? $actualite->imgUrl,


            'user_id' => auth()->id(), 
            'isPublished' =>$request->isPublished ,
            'descriptionAR'=> $validated['descriptionAR']?? $actualite->descriptionAR,
            'descriptionFR' => $validated['descriptionFR']?? $actualite->descriptionFR,
          
            'updated_at'=> now(),
            
        ]);

        return redirect('actualite')->with('status','actualite Updated Successfully');
    }
    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);
        $actualite->delete();
        return redirect()->route('actualite.index')->with('success', 'actualite deleted successfully');
    }
}