<?php

class Controller{
    public function view($view, $data = []){
        require_once 'src/app/components/' . $view . '.php';
    }

    public function model($model){
        require_once 'app/views/' . $model . '.php';
        return new $model();
    }
}