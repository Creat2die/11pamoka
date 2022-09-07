<?php

namespace App;

use App\Controllers\HomeController as H;
use App\Controllers\UserController as U;
use App\Controllers\LoginController as L;
use App\Controllers\ApiController as Api;
use App\Middlewares\Auth;


class App{
    
    static public function start(){
        session_start();
        self::router();
    }

    static public function router(){

        $url = $_SERVER['REQUEST_URI'];

        $url = explode('/', $url);
        array_shift($url);
        $method = $_SERVER['REQUEST_METHOD'];

        if (!Auth::authorize($url)) {
            return self::redirect('login');
        }

        if($method == 'GET' && count($url) == 1 && $url[0] == ''){
           
            return((new H)->home());
        }

        if($method == 'GET' && count($url) == 2 && $url[0] == 'users'  && $url[1] == 'create'){
            return((new U)->create());
        }

        if($method == 'POST' && count($url) == 2 && $url[0] == 'users' && $url[1] == 'store'){
            return((new U)->store());
        }

        if($method == 'GET' && count($url) == 1 && $url[0] == 'users'){
            return((new U)->list());
        }

        if($method == 'GET' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'edit'){
            return((new U)->edit((int) $url[2]));
        }
        //papildomi metodai prideti ir atimti pinigus
        if($method == 'GET' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'add'){
            return((new U)->add((int) $url[2]));
        }
        if($method == 'POST' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'addmoney'){
            return((new U)->addmoney((int) $url[2]));
        }
        if($method == 'GET' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'remove'){
            return((new U)->remove((int) $url[2]));
        }
        if($method == 'POST' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'removemoney'){
            return((new U)->removemoney((int) $url[2]));
        }

        if($method == 'GET' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'remove'){
            return((new U)->remove((int) $url[2]));
        }

        if($method == 'POST' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'update'){
            return((new U)->update((int) $url[2]));
        }

        if($method == 'POST' && count($url) == 3 && $url[0] == 'users' && $url[1] == 'delete'){
            return((new U)->delete((int) $url[2]));
        }

        if($method == 'GET' && count($url) == 1 && $url[0] == 'login'){
            if(Auth::isLoged()){
                return self::redirect('');
            }
            return((new L)->login());
        }

        if ($method == 'POST' && count($url) == 1 && $url[0] == 'login') {
            return((new L)->doLogin());
        }
        
        if($method == 'POST' && count($url) == 1 && $url[0] == 'logout'){
            return((new L)->logout());
        }
        
        if($method == 'GET' && count($url) == 2 && $url[0] == 'api' && $url[1] == 'go'){
            return((new Api)->doApi());
        }

    }

    static public function view($name, $data = []){
        extract($data);
        require DIR . 'resources/view/' . $name . '.php';
    }

    static public function redirect($where){
        header('Location: ' . URL . $where);
    }
}