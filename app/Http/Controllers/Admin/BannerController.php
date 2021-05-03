<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;


class BannerController extends Controller
{
    //
    public  function banners(){
        $banners = Banner::all();
        return view('admin.banners', compact('banners'));
    }

    public function saveBanner(Request $r){
        $input = $r->all();
        if($r->hasFile('image')){
            $destination_path = 'public/images/banners';
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $r->file('image')->storeAs($destination_path, $image_name);

            $banner = new Banner();
            $banner->title = $r->title;
            $banner->sub_title = $r->subtitle;
            $banner->image_url = $image_name;
            $banner->save();
            Session::flash('success', 'Banner succcessfully saved');
            return back();

        }else{
            Session::flash('error', 'Image field is required');
            return back();
        }
    }
}