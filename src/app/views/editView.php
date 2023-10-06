<?php

class editView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Edit";
        require_once __DIR__ . '/../components/edit/index.php';
    }
}