<?php

class Abc extends C{
    use A;

    public $kas =123;
    
    public function read(){
        return '-Abc-';
    }

 

    // use A, B {
    //     B::read insteadof A;
    //     A::read as read_bla;
    // }

}