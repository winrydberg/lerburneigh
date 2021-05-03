<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function getProduct($id, $slug){
        $product = Product::where('id', $id)->where('slug', $slug)->with('category')->first();
    
        if(!$product){
            return back();
        }else{
            $relateds = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(20)->get();

            // dd();
            return view('users.product', compact('product','relateds'));
        }
    }
}