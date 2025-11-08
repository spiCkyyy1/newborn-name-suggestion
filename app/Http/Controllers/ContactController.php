<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return inertia('Contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // send to admin
        Mail::raw("From: {$validated['name']} <{$validated['email']}>\n\n{$validated['message']}", function ($mail) {
            $mail->to(config('mail.from.address'))
                ->subject('New Contact Message');
        });

        return redirect()->back()->with('success', 'Thanks for contacting us!');
    }
}
