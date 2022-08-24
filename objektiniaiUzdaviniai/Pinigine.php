<?php


class Pinigine{


    private $popieriniaiPinigai;
    private $metaliniaiPinigai;


    function ideti($kiekis){
        if($kiekis>2){
            $this->popieriniaiPinigai +=$kiekis;
        } else{
            $this->metaliniaiPinigai +=$kiekis;
        }
    }


    function skaiciuoti(){
        return $this->popieriniaiPinigai+ $this->metaliniaiPinigai;
    }
}