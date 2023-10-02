<?php

class SignUp extends Controller {
  public function index() {
    $this->view('signup/index', 'signUpView', ['page' => 'SignUp']);
  }
}