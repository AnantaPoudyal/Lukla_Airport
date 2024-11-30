<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function gotoDownloads()
    {
        return view('Downloads');  // Adjust to your view name as needed
    }
}
