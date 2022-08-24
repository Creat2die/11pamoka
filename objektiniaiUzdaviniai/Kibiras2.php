<?php

class Kibiras2{





    static private $akmenuKiekisVisuoseKibiruose;


    protected $akmenuKiekis;


    public function prideti1Akmeni() :void{
        $this->akmenuKiekis++;
        self::$akmenuKiekisVisuoseKibiruose++;
    }
    public function pridetiDaugAkmenu($kiekis) : void{
        $this->akmenuKiekis+=$kiekis;
        self::$akmenuKiekisVisuoseKibiruose+=$kiekis;
    }
    public function kiekPririnktaAkmenu() : int{
        return $this->akmenuKiekis;
    }

    static public function kiekYraAkmenu() : int{
        return self::$akmenuKiekisVisuoseKibiruose;
    }

    public static function akmenuKiekisVisuoseKibiruose(){
        return self::$akmenuKiekisVisuoseKibiruose;
    }
}