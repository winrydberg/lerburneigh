<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function getTracker(){
        return view('users.tracker');
    }

    public function getOrderStatus(Request $r){

        $order = Order::where('orderno', $r->orderno)->first();
        $user = $order->user;


        $items = $order->order_items;
        $all = [];
        // foreach($items as $i){
        //     array_push($i['model']);
        // }

        if($order != null){
            return response()->json([
                'status'=>'success',
                'order'=>$order,
                'models' => json_decode($items),
                'user' => $user
            ]);
        }else{
           return response()->json([
                'status'=>'error',
                'message'=>'Order with no. '.$r->orderno.' Not Found'
            ]); 
        }
        
    }
}