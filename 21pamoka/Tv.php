<?php

class TV{
    
    public $color;
    private $size;

    public function __construct($c, $s = '42"'){
        $this->color = $c;
        $this->size = $s;
    }

    public function __destruct(){
        echo '<h1>numiro</h1>';
    }

    public function show(){
        echo '<h1>************</h1>';
    }

    public function __get($a){
        // if($a== 'size'){
        //     return $this->size;
        // }
        return $this->$a;
    }

    public function __set($kam,$ka ){
        //cia glaime rasyt validatoriu
        // if($kam == 'size'){
        //     return $this->$ka;
        // }
        $this->$kam = $ka;
    }




    public function showColor(){
        echo '<h1>'.$this->color.'</h1>';
    }





}
