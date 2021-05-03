<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use DB;

class AdminMainController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at', 'DESC')->limit(100)->get();
        $orderCount = Order::where('status', 0)->count();
        $orderProcessedToday = Order::where('status', 3)->where('created_at', '>=', date('Y-m-d'))->count();
        
        $lastMonthOrders = Order::where('status', '!=', '0')
                   ->where('created_at', '>', date('Y-m-d', strtotime(Carbon::today()->subDays(30))))->orderBy('id', 'asc')->get();

        // $today = Carbon::now();
        // $todayOrders = Order::where('status', 3)->where('created_at', '=',date('Y-m-d'))->get();
        $todayOrders = Order::whereDate('created_at', Carbon::today())->where('status', 3)->get();
      
        $todayOrderAmt = 0;
        foreach($todayOrders as $today){
           $todayOrderAmt += ($today->total_amount);
        }

        $highestOrderingCustomers = Order::with('user')->addSelect(DB::raw('SUM(total_amount) as purchase_total, user_id'))
                                    ->groupBy('user_id')->take(5)
                                    ->orderBy('purchase_total', 'DESC')->get();

        // dd($highestOrderingCustomers);
        
        $revenueCnts = [];
        $dates = [];
        $totaldelivery = 0;
        for($i=29; $i>=0; $i--){
            foreach($lastMonthOrders as $m){
                if(date('Y-m-d', strtotime($m->created_at)) == date('Y-m-d',strtotime(Carbon::now()->subDays($i)))){
                    
                    if(in_array(date('Y-m-d', strtotime($m->created_at)), $dates)){
                        $index = array_search(date('Y-m-d', strtotime($m->created_at)), $dates);
                        $revenueCnts[$index] += $m->total_amount;
                       
                        // break;
                    }else{
                        
                        $tempRevenueCnt = $m->total_amount;
                        array_push($revenueCnts, $tempRevenueCnt);
                        array_push($dates, date('Y-m-d', strtotime($m->created_at)));
                      
                    }      
                }
            }

            if(!in_array(date('Y-m-d', strtotime(Carbon::now()->subDays($i))), $dates)){
                array_push($revenueCnts, 0);
                array_push($dates, date('Y-m-d', strtotime(Carbon::now()->subDays($i))));
            }  
        }


        //
        $today = Carbon::now();
        $thisMonthIncome = 0;

        for($i=1; $i<=$today->day; $i++){
            $date = new Carbon($today->year.'-'.$today->month.'-'.$i);
            $tempdateOrders = Order::whereDate('created_at',$date)->where('status', 3)->get();
            
            foreach($tempdateOrders as $o){
                if($tempdateOrders != null){
                    $thisMonthIncome += $o->total_amount;
                }
            }
            
            
        }

        

       
        return view('admin.index', compact('orders', 
        'orderCount', 'orderProcessedToday', 'todayOrderAmt', 
        'highestOrderingCustomers', 'revenueCnts', 'dates', 'thisMonthIncome'));
    }
}