<?php

class LogOut extends Controller {
  public function index() {
    $this->view('logout/index', 'logoutView', ['page' => 'LogOut']);
  }
}