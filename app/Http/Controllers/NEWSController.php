<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NEWSController extends Controller
{
    public $news;
    public function setNews(){
        $this->news=[
            array("news_id" => 1,"news_title"=>"news abc","news_link"=>"news link"),
        ];
    }
    public function getNews(){

        return response()->json($this->news);
    }
}
