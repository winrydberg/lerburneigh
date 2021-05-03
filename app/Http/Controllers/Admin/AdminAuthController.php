<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }


    public function loginAdmin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('admin/dashboard');
        } else{
            Session::flash('error', 'Invalid Login Credentials');
            return back();
        }
        
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->to('admin/login');
    }
}