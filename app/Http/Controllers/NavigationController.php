<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public $navbarTitle;


    public function defineNavigation(){
        $this->navbarTitle="Lukla Airport";

        return $linkURLs = [
            "About" => [
                "About Us"=>route('AboutUs'),
                "About Airport"=>"about airport route"
            ],                  // Link to About Us page
            "Contact Us" => route('ContactUs'),              // Link to Contact Us page
            "Downloads" => route('Download'),                // Link to Downloads page
            "Gallery" => route('Gallery'),                  // Link to Gallery page
            "Flight Information" => route('FlightInfo'),    // Link to Flight Information page
        ];
    }
}
