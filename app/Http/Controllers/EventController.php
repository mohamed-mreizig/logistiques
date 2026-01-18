<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
        public function index()
        {
            // Retrieve only records where isPublished is true
            
            $project = Event::paginate(6); // 9 items per page
    
            // dd($document[0]->doctype);
            return view('administration.pages.event.index',['documents'=> $project] );
            // return response()->json($parametres);
        }
        public function show($id)
        {
            $projet = Event::findOrFail($id);
    
        // Return a view or JSON response with the document
            return view('administration.pages.event.edit', compact('projet'));
            // return response()->json($project);
        }
        public function create()
        {
           
    
            return view('administration.pages.event.create');
        }
        public function store(Request $request)
        {
                
            $validated = $request->validate([
                    'titleAr' => 'required|string|max:255',
                    'titleFR' => 'required|string|max:255',
                    'imageurl' =>'nullable',
                    'descriptionAr' => 'nullable|string',
                    'descriptionfr' => 'nullable|string',
                    'date_fin' => 'required',
                    'date_debut' => 'required',
                  
               
            ]);
           
            if ($request->hasFile('imageurl')) {
                // Store the image in the 'public/images' folder and get the file path
                $filePath = $request->file('imageurl')->store('eventFiles', 's3');
                // dd($imagePath);
        
                // Save the image URL (the path relative to the public folder)
                $validated['imageurl'] = ($filePath);
                // dd($validated);
            }
            Event::create([
                'imageurl' => $validated['imageurl'] ,
               'titleAr' => $validated['titleAr'],
                'titleFR' => $validated['titleFR'],
                'descriptionAr'=> $validated['descriptionAr'],
                'descriptionfr' => $validated['descriptionfr'],
                'start_at'=> $validated['date_fin'],
                'ends_at'=> $validated['date_debut'],
                'user_id' => auth()->id(), 
                'isPublished' =>( $request->isPublished == null ? 0 : 1),
    
    
    
            ]);
    
            return redirect('event')->with('status','Event Created Successfully');
        }
        public function update(Request $request,Event $event)
        {
    
            $validated = $request->validate([
                'titleAr' => 'required|string|max:255',
                    'titleFR' => 'required|string|max:255',
                    'imageurl' =>'nullable',
                    'descriptionAr' => 'nullable|string',
                    'descriptionfr' => 'nullable|string',
                    'ends_at' => 'required',
                    'start_at' => 'required',
              
            ]);
    
            if ($request->hasFile('imageurl')) {
                // Store the image in the 'public/images' folder and get the file path
                $filePath = $request->file('imageurl')->store('eventFiles', 's3');
                // dd($imagePath);
        
                // Save the image URL (the path relative to the public folder)
                $validated['imageurl'] = ($filePath);
                // dd($validated);
            }
            $event->update([
                'titleAr' => $validated['titleAr']?? $event->titleAr,
                'titleFR' => $validated['titleFR']?? $event->titleFR,
    
    
                'user_id' => auth()->id(), 
                'isPublished' => $request->isPublished ,
                'imageurl' => $validated['imageurl'] ?? $event->imageurl,
               
                'descriptionAr'=> $validated['descriptionAr']?? $event->descriptionAr,
                'descriptionfr' => $validated['descriptionfr']?? $event->descriptionfr,
                'ends_at'=> $validated['ends_at']?? $event->ends_at,
                'start_at'=> $validated['start_at']?? $event->start_at,
                
                
            ]);

    
            return redirect('event')->with('status','Event Updated Successfully');
        }
        public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('event')->with('status','event  Deleted Successfully');
    }
    }