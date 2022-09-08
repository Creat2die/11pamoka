<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;
use App\Services\Messages as M;

class UserController{
    private $error = [];

    public function create(){
        return App::view('user_create', ['title'=> 'New User']);
    }
    
    public function store(){
        

        if(strlen($_POST['name'])<3){
            $this->error += ['name' => 'Jūsų vardas per trumpas'];
        }
        if(strlen($_POST['surname'])<3){
            $this->error += ['surname' => 'Jūsų pavardė per trumpa'];
        }
        if(isset($_POST['ak']) &&  !preg_match("/^[3-9][0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[0-9]{4}$/", $_POST['ak'])){
            $this->error += ['ak' => 'Jūsų asmens kodas netinkamas'];
        }

        $usersak = Json::connect()->showAll();
        foreach ($usersak as $userak){
            if(in_array($_POST['ak'], $userak)){
                 $this->error += ['ak' => 'Jūsų asmens kodas jau yra sistemoje'];
                 break;
            }
        }

        if($this->error == null){
            Json::connect()->create([
                'name'=> ucfirst($_POST['name']),
                'surname'=> ucfirst($_POST['surname']),
                'ak'=> $_POST['ak'],
                'weight'=> $_POST['weight'],
                'tail'=> isset($_POST['tail']) ? 1 : 0
            ]);
           return App::redirect('users');
        } else{
            return App::view('user_create', ['title'=> 'New User', 'error' => $this->error]);
        

        }
        
    }

    public function list(){
        return App::view('user_list', [
            'title' => 'User List',
            'users' => Json::connect()->showAll()
        ]);
    }

    public function edit(int $id){
        return App::view('user_edit', [
            'title' => 'User Edit',
            'user' => Json::connect()->show($id)
        ]);
    }

    //dvi funkcijos atimt ir pridet
    public function addmoney(int $id){
        $useris= Json::connect()->show($id);
        if($_POST['money'] == null){
            $_POST['money']=0;
        }
        if($_POST['money']  < 0 ){
            $_POST['money']*= -1;
        }
        Json::connect()->update($id, [
            'money'=>$useris['money'] + $_POST['money'],
            'name'=> $useris['name'],
            'surname'=> $useris['surname'],
            'ak'=> $useris['ak'],
            'iban'=> $useris['iban'],
            'tail'=> $useris['tail'],

        ]);
        return App::redirect('users');
    }

    public function add(int $id){
        return App::view('user_add_money', [
            'title' => 'Remove money',
            'user' => Json::connect()->show($id)
        ]); 
    }
    //dvi funkcijos atimt ir pridet
    public function removemoney(int $id){
        $useris= Json::connect()->show($id);
        if($_POST['money'] == null){
            $_POST['money']=0;
        }
        if($useris['money'] - $_POST['money'] < 0){
            $_POST['money'] = $useris['money'];
        }
        Json::connect()->update($id, [
            'money'=>$useris['money'] - $_POST['money'],
            'name'=> $useris['name'],
            'surname'=> $useris['surname'],
            'ak'=> $useris['ak'],
            'iban'=> $useris['iban'],
            'tail'=> $useris['tail'],

        ]);
        return App::redirect('users');
    }

    public function remove(int $id){
        return App::view('user_remove_money', [
            'title' => 'Remove money',
            'user' => Json::connect()->show($id)
        ]); 
    }


    public function update(int $id){
        Json::connect()->update($id, [
            'type' => $_POST['type'],
            'weight' => $_POST['weight'],
            'tail' => isset($_POST['tail']) ? 1 : 0 
        ]);
        return App::redirect('users');
    }

    public function delete(int $id){
        $useris= Json::connect()->show($id);
        if($useris['money'] > 0){
            $this->error += ['neNulis' => 'Asmuo visdar turi lėšų saskaitoje'];
            return App::view('user_list', ['title' => 'User List', 'users' => Json::connect()->showAll(), 'error' => $this->error, 'id' => $useris['id']]);
        }
        Json::connect()->delete($id);
        return App::redirect('users', [ 'id' => $useris['id']]);
    }

}