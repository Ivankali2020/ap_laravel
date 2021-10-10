<?php

namespace App;

class container{

    public $bildingsArr=[];

    public function bind($key,$value){
        return $this->bildingsArr[$key] = $value;
    }

    public function resolve($key){
        return call_user_func($this->bildingsArr[$key]);
    }
}