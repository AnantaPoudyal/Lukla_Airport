<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FlightInformationController;
use Illuminate\Http\JsonResponse;
class WelcomeController extends Controller
{
    public function gotoWelcome(){
        $imageArray = [
            "img1"=>asset('images/homepage image slider/lulka1.jpg'),
            "img2"=>asset('images/homepage image slider/lulka2.jpg'),
            "img3"=>asset('images/homepage image slider/lulka3.jpeg'),

        ];


        $employeeDetails=[
            array("empID"=>1,"empTitles"=>"manager","empImage"=>asset('images/employee images/apple.png'),"empName"=>"apple"),
            array("empID"=>2,"empTitles"=>"officer","empImage"=>asset('images/employee images/nut.jpg'),"empName"=>"nut"),

        ];

        $flight_controller = new FlightInformationController();
        $flight_data = (array)$flight_controller->loadData()->getData();


        return view("welcome",["imageSliderData"=>$imageArray,"empDetails"=>$employeeDetails,"flight_data"=>$flight_data]);

    }
}
