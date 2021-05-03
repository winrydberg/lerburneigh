<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function getGallery(){
        $galleries = Gallery::all();
        return view('users.gallery', compact('galleries'));
    }
}