<?php

namespace App\Http\Controllers;

use App\Models\Doctype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $doctypes = Doctype::all();
        $query = Document::query();

        if (request('type')) {
            $query->where('doctype_id', request('type'));
        }

        $documents = $query->paginate(6);

        return view('administration.pages.document.index', compact('documents', 'doctypes'));
        // return response()->json($parametres);
    }
    public function create()
    {
        $types = Doctype::get();

        return view('administration.pages.document.create', ['types' => $types]);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([

            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'type' => 'required',
            'fileUrl' => 'required',
        ]);
        // dd($request->file('fileUrl'));
        if ($request->hasFile('fileUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('fileUrl')->store('directeurFile', options: 'public');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['fileUrl'] = ($filePath);
            // dd($validated);
        }
        Document::create([
            'titleAr' => $request->titleAr,
            'titleFr' => $request->titleFr,
            'user_id' => auth()->id(),
            'doctype_id' => $validated['type'],
            'isPublished' => ($request->isPublished == null ? 0 : 1),
            'fileUrl' => $validated['fileUrl'],
            'created_at' => now(),



        ]);

        return redirect('document')->with('status', 'Document Created Successfully');
    }
    public function edit(Document $document)
    {
        $types = Doctype::where('isPublished', true)->get();
        return view('administration.pages.document.edit', ['document' => $document, 'types' => $types]);
    }
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'titleAr' => 'required|string|max:255',
            'titleFr' => 'required|string|max:255',
            'type' => 'required',
            'fileUrl' => 'nullable|mimes:doc,docx,xls,xlsx,ppt,pptx,pdf|max:5120'

        ]);
        if ($request->hasFile('fileUrl')) {
            // Store the image in the 'public/images' folder and get the file path
            $filePath = $request->file('fileUrl')->store('directeurFile', 's3');
            // dd($imagePath);

            // Save the image URL (the path relative to the public folder)
            $validated['fileUrl'] = ($filePath);
            // dd($validated);
        }
        // dd($request->isPublished );
        $document->update([
            'titleAr' => $request->titleAr,
            'titleFr' => $request->titleFr,
            'user_id' => auth()->id(),
            'type' => $validated['type'],
            'isPublished' => $request->isPublished,
            'fileUrl' => $validated['fileUrl'] ?? $document->fileUrl,
            'updated_at' => now(),

        ]);

        return redirect('document')->with('status', 'Document Updated Successfully');
    }
    public function destroy($id)
    {
        $partner = Document::find($id);

        $partner->delete();
        return redirect('document')->with('status', 'Document  Deleted Successfully');
    }
}