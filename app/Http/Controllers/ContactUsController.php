<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function gotoContactUs()
    {
        return view('ContactUs',["message"=>"null"]);  // Adjust to your view name as needed
    }
}
