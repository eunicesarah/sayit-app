<?php

class mainView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Home";
        require_once __DIR__ . '/../components/home/index.php';
    }
}