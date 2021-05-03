<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminCustomerController extends Controller
{
    public function customers(){
        $users = User::all();
        return view('admin.customers', compact('users'));
    }
}