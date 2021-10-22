<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
  public function __construct()
  {
    helper('form');
    $this->LoginModel = new LoginModel();
  }

  public function index()
  {
    echo view('layout/fheader');
    echo view('login/index');
    echo view('layout/ffooter');
  }

  public function cek_login()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $cek = $this->LoginModel->cek_login($username, $password);

    if (($cek['username'] == $username) && ($cek['password'] == $password)) {
      session()->set('username', $cek['username']);
      session()->set('nama_user', $cek['nama_user']);

      return redirect()->to(base_url('home'));
    } else {

      session()->setFlashdata('gagal', 'Username atau passowrd salah!');

      return redirect()->to(base_url('login'));
    }
  }
}
