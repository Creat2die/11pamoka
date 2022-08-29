<?php

class Tenisininkas{


    private $vardas, $kamuoliukas;

    static private $zaidejas1, $zaidejas2;

    static public function zaidimoPradzia(){
        if(self::$zaidejas1 === null || self::$zaidejas2 === null ){
            echo '<h1>Kur žaidėjai??</h1>';
            return;
        }
        if(rand(0,1)){
            self::$zaidejas1->kamuoliukas =false;
            self::$zaidejas2->kamuoliukas =true;
        } else{
            self::$zaidejas2->kamuoliukas =false;
            self::$zaidejas1->kamuoliukas =true;
        }
    }

    public function arTuriKamuoliuka(){
        return $this->kamuoliukas;
    }

    public function perduotiKamuoliuka(){


        if($this->kamuoliukas){
            if(self::$zaidejas1->vardas == $this->vardas){
                self::$zaidejas1->kamuoliukas =false;
                self::$zaidejas2->kamuoliukas =true;
                echo '<h1>'. self::$zaidejas1->vardas. ' perdavė '. self::$zaidejas2->vardas .'</h1>';
            } else if (self::$zaidejas2->vardas == $this->vardas){
                self::$zaidejas2->kamuoliukas =false;
                self::$zaidejas1->kamuoliukas =true;
                echo '<h1>' . self::$zaidejas2->vardas . ' perdavė ' . self::$zaidejas1->vardas . '</h1>';
            }else{
                echo '<h1>Ziurovas</h1>';
            }
        }else{
            echo '<h1>Neturi kamuoliuko</h1>';
        }
    }


    public function __construct($vardas){
        $this->vardas = $vardas;
        if(self::$zaidejas1 === null){
            self::$zaidejas1 = $this;
        }else if (self::$zaidejas2 === null){
            self::$zaidejas2 = $this;
        }
    }
}