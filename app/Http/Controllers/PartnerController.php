<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $partner =  Partner::paginate(10);

        // dd($document[0]->doctype);
        return view('administration.pages.partners.index', ['partners'=> $partner]);
        // return response()->json($parametres);
    }
    public function create()
    {
       

        return view('administration.pages.partners.create');
    }
    public function store(Request $request)
    {
            
        $validated = $request->validate([
                'titleAr' => 'required|string|max:255',
                'titlefr' => 'required|string|max:255',
                'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
               
              
        ]);
        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('imgUrl')->store('partnersImg', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($imagePath);
        }
        Partner::create([
            'imgUrl' => $validated['imgUrl'] ,
           'titleAr' => $validated['titleAr'],
            'titlefr' => $validated['titlefr'],
            'user_id' => auth()->id(), 
            'isPublished' =>( $request->isPublished == null ? 0 : 1),
        
        ]);

        return redirect('partners')->with('status','Partners Created Successfully');
    }
    public function show($id)
    {
        $partner = Partner::findOrFail($id);

    // Return a view or JSON response with the document
        return view('administration.pages.partners.edit', compact('partner'));
        // return response()->json($project);
    }
    public function update(Request $request,Partner $partner)
    {

        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titlefr' => 'required|string|max:255',
            'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $imagePath = $request->file('imgUrl')->store('partnersImg', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($imagePath);
        }
        $partner->update([
            'titleAr' => $validated['titleAr']?? $partner->titleAr,
            'titlefr' => $validated['titlefr']?? $partner->titlefr,
            'imgUrl' => $validated['imgUrl']?? $partner->imgUrl,


            'user_id' => auth()->id(), 
            'isPublished' => $request->isPublished,

            
        ]);
        // dd($partner);

        return redirect('partners')->with('status','Partner Updated Successfully');
    }
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect('partners')->with('status','Partner Type  Deleted Successfully');
    }
}
