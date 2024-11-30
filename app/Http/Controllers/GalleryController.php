<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gotoGallery()
    {
        return view('Gallery');  // Adjust to your view name as needed
    }
}
