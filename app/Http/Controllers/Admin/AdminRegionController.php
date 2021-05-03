<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use App\Models\Region;
use App\Models\City;

class AdminRegionController extends Controller
{
    public function newCity(){
        $regions = Region::all();
        return view('admin.newcity', compact('regions'));
    }

    public function saveCity(Request $r){
        $city = new City();
        $city->name = $r->name;
        $city->region_id = $r->region;
        $city->charge = $r->charge;
        if($city->save()){
            Session::flash('success', 'City successfully saved');
            return back();
        }else{
            Session::flash('error', 'Oops something went wrong. Please try again');
            return back();
        }
    }

    public function getCities(){
        $cities = City::with('region')->paginate(10);
        return view('admin.cities', compact('cities'));
    }
}