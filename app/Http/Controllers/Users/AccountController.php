<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use Auth;

class AccountController extends Controller
{
    //
    public function getAccount(){
        $user = Auth::user();
        $orders = $user->orders;
        
        return view('users.account', compact('orders'));
    }
}