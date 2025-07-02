<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store in database
        $contact = ContactMessage::create($validated);

        // Send email
        Mail::raw(
            "New contact message from: {$validated['name']} <{$validated['email']}>

{$validated['message']}",
            function ($message) use ($validated) {
                $message->to(config('mail.from.address'))
                        ->subject('New Contact Message');
            }
        );

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
