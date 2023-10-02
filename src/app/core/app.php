<?php

class App {
  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];


  public function __construct()
  {
    $url = $this->parse_url();
    if (file_exists('src/app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    else {
      $this->controller = 'home';
    }

    require_once 'src/app/controllers/' . $this->controller . '.php';

    $this->controller = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    if ($url) {
      $this->params = array_values($url);
    }
    
    call_user_func_array([$this->controller, $this->method], $this->params);
    // echo "<script>console.log('lalalla',   call_user_func_array([$this->controller, $this->method], $this->params))</script>";

  }

  public function parse_url(){
    if (isset($_SERVER['REQUEST_URI'])) {
      $url = rtrim($_SERVER['REQUEST_URI'], '/');
      $url = ltrim($url, 'public/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = ltrim($url, '?');
      $url = explode('/', $url);
      return $url;
    }
  }
}