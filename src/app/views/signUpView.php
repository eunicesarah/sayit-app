<?php

class signUpView implements ViewInterface{
    public $data;
    public function __construct($data = []){
        $this->data = $data;
    }
    
    public function render(){
        $page = "SignUp";
        require_once __DIR__ . '/../components/signup/index.php';
    }
}