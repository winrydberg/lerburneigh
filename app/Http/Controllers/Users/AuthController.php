<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function auth(){
        Session::put('login','active');
        Session::put('register','');
        return view('users.login');
    }

    /**
     * REGISTER
     */
    public function getRegister(){
        return view('users.register');
    }

    /**
     * LOGOUT USER
     */
    public function logoutUser(){
        Auth::logout();
        return redirect()->to('/');
    }

    /**
     * LOGIN USER
     */
    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(is_numeric($request->get('username'))){
            if (Auth::attempt(['phoneno'=>$request->username, 'password'=>$request->password])) {
                Session::flash('success', 'Hello, You have successfully logged into your account');
                return redirect()->intended('my-account');
            }else{
                Session::flash('error', 'Oops Invalid Login Credentials');
                return back();
            }
        }else{
            if (Auth::attempt(['email'=>$request->username, 'password'=>$request->password])) {
                Session::flash('success', 'Hello, You have successfully logged into your account');
                return redirect()->intended('my-account');
            }else{
                Session::flash('error', 'Oops Invalid Login Credentials');
                return back();
            }
        }
         
    }

    /**
     * REGISTER USER
     */
    public function registerUser(Request $r){
        Session::put('register','active');
        Session::put('login','');
        $validated = $r->validate([
            'firstname'=>'required',
            'phoneno' => 'required|unique:users|max:13',
            'password' => 'required|min:5',
            'confirmpassword'=>'required|same:password'
        ]);
        $user = new User();
        $user->firstname = $r->firstname;
        $user->lastname = 'NOT USED';
        $user->phoneno = $r->phoneno;
        $user->password = Hash::make($r->password);
        $user->email = $r->email;
        
        if($user->save()){
            if (Auth::attempt(['phoneno'=>$r->phoneno, 'password'=>$r->password])) {
                Session::flash('success', 'Hello, '.$r->firstname.' You have authomatically logged into your new account. Start Shopping Now');
                return redirect()->intended('my-account');
            }else{
                Session::flash('error', 'Oops Invalid Login Credentials');
                return back();
            }
        }else{
            Session::flash('error','Oops unable to create account. Please try again.');
            return back();
        }
    }
}