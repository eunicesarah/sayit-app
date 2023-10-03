<?php

class profileView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Profile";
        require_once __DIR__ . '/../components/profile/index.php';
    }
}