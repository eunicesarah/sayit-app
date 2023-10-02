<?php

class ruangDiskusi extends Controller {
  public function index() {
    $this->view('ruangdiskusi/index', 'ruangDiskusiView', ['page' => 'RuangDiskusi']);
  }
}