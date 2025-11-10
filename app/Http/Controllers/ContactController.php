<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewRequestNotificationMail;
use App\Mail\CustomerRequestReceiveMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function show()
    {
        return inertia('Contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Send confirmation to customer
            Mail::to($data['email'])->queue(new CustomerRequestReceiveMail($data['name']));

            // Send notification to admin
            Mail::to('admin@yourdomain.com')->queue(new AdminNewRequestNotificationMail($data));

            return Redirect::route('welcome')->with('success', 'We have received your request. Thank you for contacting us!');
        } catch (\Exception $e) {
            \Log::error('Mail failed: '.$e->getMessage());

            return back()->with('error', 'Sorry, something went wrong. Try again later.');
        }

    }
}
