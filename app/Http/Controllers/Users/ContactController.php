<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function sendMessage(Request $r){
         $validated = $r->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phoneno' => 'required|min:10|max:13',
            'message' => 'required',
        ]);
        
        $contact = new Contact();
        $contact->name = $r->name;
        $contact->email = $r->email;
        $contact->phoneno = $r->phoneno;
        $contact->message = $r->message;
        if($contact->save()){
            Session::flash('success', "Message sent successfully. We'll get back to you shortly.");
            return back();
        }else{
            Session::flash('error', 'Oops something went wrong. Unable to send message. Please try again.');
            return back();
        }
    }
}