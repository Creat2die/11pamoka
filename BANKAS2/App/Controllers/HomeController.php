<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;

class HomeController{
    
    public function home(){
    $title ='HOME';
    $welcome = "Sveiki Atvyke į BANKA V2";

    Json::connect();

    return App::view('home', ['title' => $title, 'welcome' => $welcome]);
    }
}