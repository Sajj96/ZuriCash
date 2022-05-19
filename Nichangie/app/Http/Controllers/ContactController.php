<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        try {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            if($contact->save()) {
                \Mail::send('emails.contact', array(
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'subject' => $request->get('subject'),
                    'user_query' => $request->get('message'),
                ), function($message) use ($request){
                    $message->from($request->email);
                    $message->to('captainsajjad4@gmail.com', 'Admin')->subject($request->get('subject'));
                });
                return redirect()->route('contact')->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('contact')->with(['error' => $e->getMessage()]);
        }
    }
}
