<?php

class Artikel extends Controller {
  public function index() {
    $this->view('artikel/index', 'artikelView', ['page' => 'Artikel']);
  }
}