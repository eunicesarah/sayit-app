<?php

class adminView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Admin";
        require_once __DIR__ . '/../components/admin/index.php';
    }
}