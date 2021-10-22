<?php

namespace App\Controllers;

class Landing extends BaseController
{
  public function index()
  {
    echo view('layout/fheader');
    echo view('landing/index');
    echo view('layout/ffooter');
  }
}
