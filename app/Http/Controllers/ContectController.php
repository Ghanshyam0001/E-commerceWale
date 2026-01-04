<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contect;

class ContectController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Check for duplicate by email OR same name + message
        $duplicate = Contect::where('email', $request->email)
            ->orWhere(function ($q) use ($request) {
                $q->where('name', $request->name)
                    ->where('message', $request->message);
            })
            ->first();

        if ($duplicate) {
            return redirect('/')->with('error', 'Duplicate entry!'); // redirect home
        }

        // Save message
        Contect::create($request->only('name', 'email', 'message'));

        return redirect('/')->with('success', 'Message submitted successfully!');
    }

    
    public function contacts()
    {
        $messages = Contect::latest()->get();
        return view('admin-panel.contect.contects', compact('messages'));
    }

 
    public function contactsshow($id)
    {
        $message = Contect::findOrFail($id);
        return view('admin-panel.contect.contactshow', compact('message'));
    }
}
