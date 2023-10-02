<?php

class ruangDiskusiView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "Ruang Diskusi";
        require_once __DIR__ . '/../components/ruangdiskusi/index.php';
    }
}