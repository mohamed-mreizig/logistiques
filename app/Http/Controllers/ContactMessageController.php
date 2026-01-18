<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        ContactMessage::create($validated);
        
        return back()->with('success', 'Message envoyé avec succès!');
    }

    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('administration.pages.messages.index', compact('messages'));
    }

    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return back()->with('success', 'Message supprimé avec succès!');
    }

    public function toggleRead($id)
        {
            $message = ContactMessage::findOrFail($id);
            $message->is_read = !$message->is_read;
            $message->save();
            
            return response()->json(['success' => true, 'is_read' => $message->is_read]);
        }
}