<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicetype;
class ServicetController extends Controller
{
    //
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $service = Servicetype::get();

        // dd($document[0]->doctype);
        return view('administration.pages.service.type.index',['servicetypes' => $service ]);
        // return response()->json($parametres);
    }
    public function create()
    {
        return view('administration.pages.service.type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Servicetype::create([
            'type' => $request->name,
            'created_at' => now(),
            'isPublished'=> $request->has('isPublished') ? 1 : 0,
            'user_id' => auth()->id(), 
        ]);

        return redirect('servicetad')->with('status','Service Type Created Successfully');
    }
    public function edit($id)
    { 
        $servicetype=ServiceType::findOrFail($id);
        return view('administration.pages.service.type.edit',[
            'type' => $servicetype
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
            ]
        ]);
        $servicetype=ServiceType::findOrFail($id);
        $servicetype->update([
            'type' => $request->name,
            'isPublished'=> $request->isPublished
        ]);

        return redirect('servicetad')->with('status','Service Type Updated Successfully');
    }
    public function destroy($id)
    {
        $service = ServiceType::find($id);
        $service->delete();
        return redirect('servicetad')->with('status','Service Type  Deleted Successfully');
    }

}
