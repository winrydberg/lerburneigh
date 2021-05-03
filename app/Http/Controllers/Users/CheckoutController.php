<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\City;
use App\Models\Region;
use App\Models\ShippingDetails;
use App\Models\Order;


class CheckoutController extends Controller
{
    public function checkOut(){
        $regions = Region::with('cities')->get();
        $items = Cart::instance('shopping')->content();
        return view('users.checkout', compact('regions', 'items'));
    }

    public function getCities(Request $r){
        $cities = City::where('region_id', $r->id)->get();
        return response()->json([
            'status'=>'success',
            'cities'=>$cities
        ]);
    }

    public function getCityCharge(Request $r){
        $city = City::find($r->id);
        if($city){
            return response()->json([
                'status' => 'success',
                'charge' => $city->charge,
                'total' => (float)Cart::subtotal() + (float)$city->charge
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'charge' => '0'
            ]);
        }
    }

    public function placeOrder(Request $r){

       try{
            
            $data = $r->all();


            if($data['collectionmode'] == 2){
                //its a pickup so just create a new order

                //create shipping address
                $shippingAdd = new ShippingDetails();
                $shippingAdd->firstname = $data['fname'];
                $shippingAdd->lastname = 'NOT USED';
                $shippingAdd->email = $data['email'];
                $shippingAdd->phoneno = $data['phoneno'];
                $shippingAdd->save();

                 if($data['paymentmode'] =='MM'){
                    $paymentinfo = json_encode([
                        'momonetwork' => $data['momonetwork'],
                        'momonumber' => $data['momonumber'],
                    ]);
                }else{
                    $paymentinfo = json_encode([
                        'cardname' => $data['cardname'],
                        'cardno' => $data['cardno'],
                        'expyear' => $data['expyear'],
                        'expmonth' => $data['expmonth'],
                    ]);
                }



                 //create the order
                $orderno = mt_rand(1000000,9999999);

                $orderitems = [];
                $contents = Cart::instance('shopping')->content();

                foreach($contents as $c){
                    array_push($orderitems, $c->model);
                }
                
                $order = new Order();
                $order->orderno = $orderno;
                $order->order_items = json_encode($orderitems);
                $order->total_amount = Cart::subtotal();
                $order->order_qty = Cart::instance('shopping')->count();
                $order->delivery_charge = 0;
                $order->collectionmode = 'PICKUP';
                $order->shipping_details_id = $shippingAdd->id;
                $order->user_id = Auth::user() != NULL?Auth::user()->id: 0;
                $order->paymentmode = $data['paymentmode'];
                $order->paymentinfo = $paymentinfo;

                if($order->save()){
                    //create payment mode for order.
                    Cart::destroy();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Order Placed successfully. Our team will contact you soon. You can use the order No.'.$orderno.' to track order'
                    ]);
                }else{
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Oops Unable to place order. Please try again.'
                    ]);
                }

                   
            }else if($data['collectionmode'] == 1){

                $city = City::where('id', $data['city'])->first();
                $region = Region::where('id', $data['region'])->first();

                if($city == null || $region == null){
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Please select a region and city for delivery'
                    ]);
                }

                //create shipping address
                $shippingAdd = new ShippingDetails();
                $shippingAdd->firstname = $data['fname'];
                $shippingAdd->lastname = 'NOT USED';
                $shippingAdd->email = $data['email'];
                $shippingAdd->phoneno = $data['phoneno'];
                $shippingAdd->landmark = $data['landmark'];
                // $shippingAdd->gps_code = $r->gps_code;
                $shippingAdd->region = $data['region'];
                $shippingAdd->city = $data['city'];
                $shippingAdd->save();


                if($data['paymentmode'] =='MM'){
                    $paymentinfo = json_encode([
                        'momonetwork' => $data['momonetwork'],
                        'momonumber' => $data['momonumber'],
                    ]);
                }else{
                    $paymentinfo = json_encode([
                        'cardname' => $data['cardname'],
                        'cardno' => $data['cardno'],
                        'expyear' => $data['expyear'],
                        'expmonth' => $data['expmonth'],
                    ]);
                }


                //create the order
                $orderno = mt_rand(1000000,9999999);

                $orderitems = [];
                $contents = Cart::instance('shopping')->content();

                foreach($contents as $c){
                    array_push($orderitems, $c->model);
                }
                
                $order = new Order();
                $order->orderno = $orderno;
                $order->order_items = json_encode($orderitems);
                $order->total_amount = Cart::subtotal();
                $order->order_qty = Cart::instance('shopping')->count();
                $order->delivery_charge = $city->charge;
                $order->collectionmode = 'DELIVERY';
                $order->shipping_details_id = $shippingAdd->id;
                $order->user_id = Auth::user() != NULL?Auth::user()->id: 0;
                $order->paymentmode = $data['paymentmode'];
                $order->paymentinfo = $paymentinfo;


                if($order->save()){
                    //create payment mode for order.
                    Cart::destroy();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Order Placed successfully. Our team will contact you soon. You can use the order No. '.$orderno.' to track order'
                    ]);
                }else{
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Oops Unable to place order. Please try again.'
                    ]);
                }


            }else{
                return response()->json([
                    'status'=>'error',
                    'message' =>'Bad Request Format. Please try again'
                ]);
            }

            

            return response()->json($data['fname']);




            return response()->json([
                'status'=> 'success',
                'message' => 'Order received. One of our distributors will contact you soon.'
            ]);
       }catch(\Throwable $e){
            return response()->json([
                'status'=> 'error',
                'mess'=> $e->getMessage(),
                'message' => ''
            ]);
       }
       
       
    }
}