<?php

session_start();

define('INSTALL', '/11pamoka/login/');
define('DIR', __DIR__ . '/');
define('URL', 'http://localhost/11pamoka/login');

router();


function router(){


    $url = $_SERVER['REQUEST_URI'];
    $url = str_replace(INSTALL, '', $url);
    $url = explode('/', $url);
    $method =$_SERVER['REQUEST_METHOD'];

    if($method == 'GET' && count($url) == 1 && $url[0] == 'login'){
        view('login');
    }
    else if($method == 'POST' && count($url) == 1 && $url[0] == 'login'){
        
    }


   // require DIR . 'inc/' .'home.php';
}

function view($tmp){
    require DIR . 'inc/' . $tmp . '.php';

}