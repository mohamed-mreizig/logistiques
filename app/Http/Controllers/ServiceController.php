<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Servicetype;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    //
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $service = Service::get();

        // dd($document[0]->doctype);
        return view('administration.pages.service.index',['services' => $service]);
        // return response()->json($parametres);
    }
    public function create()
    {
        $types = Servicetype::get();
        return view('administration.pages.service.create',['types'=>$types]);
    }
    public function store(Request $request)
    {
            
        $validated = $request->validate([
                'titleAr' => 'required|string|max:255',
                'titleFr' => 'required|string|max:255',
                'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'descriptionAr' => 'nullable|string',
                'descriptionFr' => 'nullable|string',
                'type' => 'required|string',
               
              
           
        ]);

        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('imgUrl')->store('serviceFiles', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($filePath);
            // dd($validated);
        }
        Service::create([
            'imgUrl' => $validated['imgUrl'] ,
           'titleAr' => $validated['titleAr'],
            'titleFr' => $validated['titleFr'],
            'descriptionAr'=> $validated['descriptionAr'],
            'descriptionFr' => $validated['descriptionFr'],
            'user_id' => auth()->id(), 
            'isPublished' =>$request->has('isPublished') ? 1 : 0,
            'created_at' => now(),
                   'servicetype_id'=> $validated['type']




        ]);

        return redirect('servicead')->with('status','Event Created Successfully');
    }
    public function show($id)
    { 
        $service=Service::findOrFail($id);
        $types = Servicetype::where('isPublished', true)->get();
  

        return view('administration.pages.service.edit',[
            'service' => $service,
            'types'=> $types
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);

        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'imgUrl' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'type'=> 'nullable',

            'descriptionAr' => 'nullable|string',
            'descriptionFr' => 'nullable|string',
        ]);
        

        if ($request->hasFile('imgUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('imgUrl')->store('serviceFiles', 's3');
            // dd($imagePath);
    
            // Save the image URL (the path relative to the public folder)
            $validated['imgUrl'] = ($filePath);
            // dd($validated);
        }
        $service=Service::findOrFail($id);
    //    dd($validated);
        $service->update([
            'titleAr' => $validated['titleAr']?? $service->titleAr,
            'titleFr' => $validated['titleFr']?? $service->titleFr,


            'user_id' => auth()->id(), 
            'isPublished' =>$request->isPublished,
            'imageurl' => $validated['imageurl'] ?? $service->imgUrl,
           'servicetype_id'=> $validated['type'] ?? $service->servicetype_id ,
            'descriptionAr'=> $validated['descriptionAr']?? $service->descriptionAr,
            'descriptionFr' => $validated['descriptionFr']?? $service->descriptionFr,

        ]);


        return redirect('servicead')->with('status','Service Type Updated Successfully');
    }
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('servicead')->with('status','Service  Deleted Successfully');
    }
    
}
