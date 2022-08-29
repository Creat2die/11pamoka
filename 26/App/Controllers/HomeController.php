<?php
namespace App\Controllers;

use App\App;
use App\DB\Json;

class HomeController{

    public function home(){
        $title = 'HOME';
        $welcome = "hello fancy zoo!";

        new Json;

        return App::view('home', ['title' => $title, 'welcome' => $welcome]);
    }
}