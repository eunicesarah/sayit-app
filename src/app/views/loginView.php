<?php

class loginView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Login";
        require_once __DIR__ . '/../components/login/index.php';
    }
}