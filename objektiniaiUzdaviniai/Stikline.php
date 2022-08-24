<?php


class Stikline{

    private $turis, $kiekis;

    public function __construct($turis){
        $this->kiekis = 0;
        $this->turis = $turis;
    }

    function ipilti($kiekis) : self{
        $this->kiekis = min($this->turis, $this->kiekis + $kiekis);
        return $this;
    }
    function ispilti() :int{
        $buvo = $this->kiekis;
        $this->kiekis = 0;
        return $buvo;
    }

}