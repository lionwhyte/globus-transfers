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
            return view('contact', ['failed_message' => __('content.contact_message_failed')]);
        }

        // Validate the input with custom error messages
        $request->validate([
            'contact_full_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'max:20',
            'contact_message' => 'required|string',
        ], [
            'contact_full_name.required' => __('content.contact_full_name_required'),
            'contact_full_name.string' =>  __('content.contact_full_name_string'),
            'contact_full_name.max' =>  __('content.contact_full_name_max'),
            
            'contact_email.required' =>  __('content.contact_email_required'),
            'contact_email.email' =>  __('content.contact_email_email'),
            'contact_email.max' =>  __('content.contact_email_max'),
            
            // 'contact_phone.required' =>  __('content.contact_phone_required'),
            'contact_phone.string' =>  __('content.contact_phone_string'),
            'contact_phone.max' =>  __('content.contact_phone_max'),
            
            'contact_message.required' =>  __('content.contact_message_required'),
            'contact_message.string' =>  __('content.contact_message_string'),
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
        
        return view('contact', ['success_message' => __('content.contact_message_success')]);
    }
}
