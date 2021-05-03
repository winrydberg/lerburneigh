<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class AdminCategoryController extends Controller
{
    public function newCategory(){
        $categories = Category::whereNull('parent')->get();
        
        return view('admin.new_category', compact('categories'));
    }

    /**
     * GET CATEGORIES
     */
    public function categories(){
        $categories = Category::withCount('products')->get();
        // dd($categories);
        return view('admin.categories', compact('categories'));
    }

    /**
     * SAVE NEW CATEGORY
     */
    public function saveCategory(Request $r){
       $category = new Category();
       $category->name = $r->name;
       $category->parent = $r->parent=='0'?NULL:$r->parent;
       $category->icon = $r->icon;
       $category->slug = Str::slug($r->name);
       if($category->save()){
           Session::flash('success', 'Category successfully saved');
           return back();
       }else{
           Session::flash('error', 'Oops unable to save category. Please try again');
           return back();
       }
       
    }
}