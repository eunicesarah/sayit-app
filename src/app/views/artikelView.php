<?php

class artikelView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Artikel";
        require_once __DIR__ . '/../components/artikel/index.php';
    }
}