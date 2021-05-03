<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Session;

class AdminProductController extends Controller
{
    public function newProduct(){
         $categories = Category::with('children')->whereNull('parent')->get();
        //  return response()->json($categories);
        return view('admin.newproduct', compact('categories'));
    }

    public function saveProduct(Request $r){
        // dd($r->all());
        if($r->hasFile('image')){
            $destination_path = 'public/images/products';
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $r->file('image')->storeAs($destination_path, $image_name);

            $product = new Product();
            $product->name = $r->name;
            $product->slug = Str::slug($r->name);
            $product->image = $image_name;
            $product->instock = true;
            $product->featured = $r->featured==1?true:false;
            $product->price = $r->price;
            $product->sale_price = $r->sale_price;
            $product->category_id = $r->category;
            $product->description = $r->description;
            $product->save();
            Session::flash('success', 'Product succcessfully saved');
            return back();
        }else{
            Session::flash('error', 'Product image is required');
            return back();
        }
    }

    public function getProducts(){
        $products = Product::all();
        return view('admin.products', compact('products'));
    }
}