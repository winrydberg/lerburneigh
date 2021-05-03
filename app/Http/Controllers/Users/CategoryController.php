<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategoryProducts($slug){

       
        $category = Category::where('slug', $slug)->first();

        if(!$category){
            return back();
        }
        $products = $category->products;
        $categories = Category::where('parent', $category->id)->with('children')->get();
        return view('users.category', compact('products', 'category','categories'));
    }
}