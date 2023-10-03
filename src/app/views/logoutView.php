<?php

class logoutView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "LogOut";
        require_once __DIR__ . '/../components/logout/index.php';
    }
}