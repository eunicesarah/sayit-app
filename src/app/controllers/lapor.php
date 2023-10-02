<?php

class Lapor extends Controller {
  public function index() {
    $this->view('lapor/index', 'laporView', ['page' => 'Lapor']);
  }
}