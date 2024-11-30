<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightInformationController extends Controller
{
    public $flightData;
    public function loadData(){
        $this->flightData = DB::table("flight_information")->get();
        return response()->json($this->flightData);

    }
    public function gotoFlightInfo()
    {
        $this->loadData();  // Load flight data before displaying the view
        return view('FlightInformation',["flight_data"=>$this->flightData]);  // Adjust to your view name as needed
    }

}
