<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Session;

class AdminGalleryController extends Controller
{
    public function newGallery(){
        return view('admin.newgallery');
    }

    public function saveGallery(Request $r){
         if($r->hasFile('image')){
            $destination_path = 'public/images/gallery';
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $r->file('image')->storeAs($destination_path, $image_name);
            
            $gallery = new Gallery();
            $gallery->image = $image_name;
            $gallery->caption = $r->caption;

            $gallery->save();

            Session::flash('success', 'Photo succcessfully saved to gallery');
            return back();
        }else{
            Session::flash('error', 'Gallery Image is required');
            return back();
        }
    }

    public function galleries(){
        $galleries = Gallery::paginate(15);
        return view('admin.galleries');
    }
}