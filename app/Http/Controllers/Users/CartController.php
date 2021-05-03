<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function getCart(){
    //    Cart::destroy();
        $items = Cart::instance('shopping')->content();
        // dd($items);
        $carts = [];
        $total = 0;
        foreach($items as $row) {
        //    array_push($carts, $row->model); 
           $total += (float)$row->qty * (float)$row->model->price;
        }

        // dd( Cart::instance('shopping')->count());
        return view('users.cart', compact('items', 'total'));
    }

    public function addToCart(Request $r){
        $product = Product::find($r->id);
        if(!$product){
                return response()->json([
                    'status'=>'error',
                    'message' => "Product Not Found"
                ]);
        }else{
            $cartItem = Cart::instance('shopping')->add($product->id, $product->name, 1, $product->price)->associate(Product::class);
            Cart::instance('shopping')->store($cartItem->rowId);
            $cartCount = Cart::instance('shopping')->count();

            $items = Cart::instance('shopping')->content();
            $total = 0;
            foreach($items as $row) {
            $total += (float)$row->qty * (float)$row->model->price;
            }
                return response()->json([
                    'data'=>$cartItem,
                    'status'=>'success',
                    'cartCount' => $cartCount,
                    'cartAmount' => $total,
                    'message' => "Product successfully added to cart"
                ]);
        }
       
    }

    public function removeItem(Request $r){
        try{
             Cart::remove($r->rowId);
             return response()->json([
                 'status' => 'success',
                 'message' => 'Item successfully removed from cart'
             ]);
        }catch(\Throwable $e){
             return response()->json([
                 'status' => 'error',
                 'message' => 'Oops something went wrong. Unable to remove item. Please try again'
             ]);
        }
        
    }


    public function emptyCart(){
        Cart::destroy();
        return response()->json([
            'status'=>'success',
            'message' =>'Cart Successfully cleared'
        ]);
    }

    public function updateCart(Request $r){

         Cart::update($r->rowId, $r->qty);

         return response()->json([
             'status'=> 'success',
             'message' => 'Cart Item Successfully Updated'
         ]);
    }
}