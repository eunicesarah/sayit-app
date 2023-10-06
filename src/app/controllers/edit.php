<?php

class Edit extends Controller {
  public function index() {
    $this->view('edit/index', 'editView', ['page' => 'Edit']);
  }
}