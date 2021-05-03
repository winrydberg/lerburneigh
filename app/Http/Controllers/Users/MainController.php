<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;

class MainController extends Controller
{

    public function index(){
        $categories = Category::with('children')->whereNull('parent')->get();
        $products = Product::where('featured', true)->where('instock', true)->inRandomOrder()->limit(12)->get();
        $others = Product::inRandomOrder()->limit(20)->get();
        $banners = Banner::where('active', true)->get();
        return view('users.index', compact('categories','banners', 'products', 'others'));
    }
    /**
     * CONTACT US
     */
    public function contact(){
        return view('users.contact');
    }

    /**
     * ABOUT US VIEWS
     */
    public function aboutUs(){
        return view('users.about');
    }
}