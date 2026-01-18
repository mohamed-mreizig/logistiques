<?php

namespace App\Http\Controllers;

use App\Models\Doctype;
use Illuminate\Http\Request;

class DoctypeController extends Controller
{
    //
    public function index()
    {
        // Retrieve only records where isPublished is true
        
        $doctype = Doctype::get();

        // dd($document[0]->doctype);
        return view('administration.pages.document.doctype.index',['servicetypes' => $doctype ]);
        // return response()->json($parametres);
    }
    public function create()
    {
        return view('administration.pages.document.doctype.create');
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

        Doctype::create([
            'type' => $request->name,
            'created_at' => now(),
            'isPublished' =>( $request->isPublished == null ? 0 : 1),
            'footer' =>( $request->footer == null ? 0 : 1),
            'user_id' => auth()->id(), 
        ]);

        return redirect('documentad')->with('status','Document Type Created Successfully');
    }
    public function edit($id)
    { 
        $servicetype=Doctype::findOrFail($id);
        // dd($servicetype->isPublished);
        return view('administration.pages.document.doctype.edit',[
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
        // dd($request);
        $servicetype=Doctype::findOrFail($id);
        $servicetype->update([
            'type' => $request->name,
            'isPublished' =>$request->isPublished,
            'footer' => $request->footer ,
        ]);
        

        return redirect('documentad')->with('status','Document Type Updated Successfully');
    }
    public function destroy($id)
    {
        $service = Doctype::find($id);
        $service->delete();
        return redirect('documentad')->with('status','Document Type  Deleted Successfully');
    }
}
