<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Check if the order has already been confirmed
        if (
            session()->has('message_sent') && 
            session('contactData.contact_full_name') == $request->input('contact_full_name') &&
            session('contactData.contact_email') == $request->input('contact_email') &&
            session('contactData.contact_phone') == $request->input('contact_phone') &&
            session('contactData.contact_message') == $request->input('contact_message')
        ) {
            return view('contact', ['failed_message' => 'Your message has already been sent.']);
        }
        // Validate the input
        $request->validate([
            'contact_full_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_message' => 'required|string',
        ]);

        // Mark the order as confirmed in the session
        session(['message_sent' => true]);
        Session::put('contactData', [
            'contact_full_name' => $request->input('contact_full_name'),
            'contact_email' => $request->input('contact_email'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_message' => $request->input('contact_message')
        ]);

        // Send mail to the company
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($request));
        
        return view('contact', ['success_message' => 'Your message has been sent. We will get back to you soon.']);
    }
}
