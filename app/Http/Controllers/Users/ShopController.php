<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function enterShop(){
        $categories = Category::with('children')->whereNull('parent')->get();

        $products = Product::where('instock', true)->paginate(2);
        return view('users.shop', compact('categories', 'products'));
    }
}