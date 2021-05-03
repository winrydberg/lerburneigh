<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function getMessages(){
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(20);
        // dd($contacts);

        return view('admin.inbox', compact('contacts'));
    }
}