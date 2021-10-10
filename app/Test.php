<?php

namespace App;

class Test{
    
    protected $name;

    public function __construct($name){
        return $this->name = $name;
    }

    public function smth(){
        return $this->name;
    }   
}