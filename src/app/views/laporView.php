<?php

class laporView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Lapor";
        require_once __DIR__ . '/../components/lapor/index.php';
    }
}