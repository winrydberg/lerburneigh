<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    //
    public function searchProduct(Request $r){
      $term = $r->query('product');
      $products = Product::where('name', 'LIKE', '%' . $term . '%')->paginate(25);
      return view('users.search', compact('products'));
    }
}