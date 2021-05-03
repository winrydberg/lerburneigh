<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\City;

class AdminOrderController extends Controller
{
    public function orders(){
        $orders = Order::orderBy('id', 'DESC')->paginate(20);
        
        return view('admin.orders', compact('orders'));
    }

    public function getOrderDetails($id){
        $order = Order::with('shippingdetails')->with('user')->where('id', $id)->first();

        $orderitems = json_decode($order->order_items);
        
        $city = City::where('id', $order->shippingdetails->city)->first();
        if($order){
            return view('admin.order_details', compact('order', 'city', 'orderitems'));
        }else{
            return back();
        }
    }

    public function updateOrderStatus(Request $r){
        
        $order = Order::where('id', $r->orderid)->first();

        if($order != null){
            $order->status = $r->status;
            $order->save();
             return response()->json([
                 'status' => 'success',
                 'message' => 'Order Status successfully updated'
             ]);
        }else{
            return response()->json([
                 'status' => 'error',
                 'message' => 'Oops Order not available. Order may have been deleted'
             ]);
        }
    }
}