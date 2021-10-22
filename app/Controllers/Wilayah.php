<?php

namespace App\Controllers;

use App\Models\WilayahModel;

class Wilayah extends BaseController
{
  protected $wilayah;

  function __construct()
  {
    $this->wilayah = new WilayahModel();
  }

  // public function index()
  // {
  //   $data['wilayah'] = $this->wilayah->findAll();

  //   echo view('layout/header');
  //   echo view('layout/sidebar');
  //   return view('wilayah/index', $data);
  //   echo view('layout/footer');
  // }
  public function index()
  {
    $data['wilayah'] = $this->wilayah->get_wilayah();

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('wilayah/index', $data);
    echo view('layout/footer');
  }

  public function create()
  {
    echo view('layout/header');
    echo view('layout/sidebar');
    return view('wilayah/create');
    echo view('layout/footer');
  }

  // public function save()
  // {
  //   $this->wilayah->insert([
  //     'kode_wilayah' => $this->request->getPost('kode_wilayah'),
  //     'nama_wilayah' => $this->request->getPost('nama_wilayah')
  //   ]);

  //   return redirect()->to('/wilayah');
  // }
  public function save()
  {
    $data['wilayah'] = $this->wilayah->insert_wilayah([
      'kode_wilayah' => $this->request->getPost('kode_wilayah'),
      'nama_wilayah' => $this->request->getPost('nama_wilayah')
    ]);

    return redirect()->to('/wilayah');
  }

  // function edit($kode_wilayah)
  // {
  //   $dataWilayah = $this->wilayah->find($kode_wilayah);
  //   if (empty($dataWilayah)) {
  //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
  //   }
  //   $data['wilayah'] = $dataWilayah;

  //   echo view('layout/header');
  //   echo view('layout/sidebar');
  //   return view('wilayah/edit', $data);
  //   echo view('layout/footer');
  // }
  public function edit($kode_wilayah)
  {
    $data['wilayah'] = $this->wilayah->edit_wilayah($kode_wilayah);

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('wilayah/edit', $data);
    echo view('layout/footer');
  }

  public function update($kode_wilayah)
  {
    $data = [
      'kode_wilayah' => $this->request->getPost('kode_wilayah'),
      'nama_wilayah' => $this->request->getPost('nama_wilayah')
    ];

    $this->wilayah->update_wilayah($data, $kode_wilayah);
    session()->setFlashdata('message', 'Data Wilayah Berhasil Diupdate!');
    return redirect()->to('/wilayah');
  }

  // function delete($kode_wilayah)
  // {
  //   $dataWilayah = $this->wilayah->find($kode_wilayah);
  //   if (empty($dataWilayah)) {
  //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
  //   }
  //   $this->wilayah->delete($kode_wilayah);
  //   session()->setFlashdata('message', 'Delete Data Pegawai Berhasil');
  //   return redirect()->to('/wilayah');
  // }
  function delete($kode_wilayah)
  {
    // $dataWilayah = $this->wilayah->find($kode_wilayah);
    // if (empty($dataWilayah)) {
    //   throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
    // }
    $this->wilayah->delete_wilayah($kode_wilayah);
    session()->setFlashdata('message', 'Data Wilayah Berhasil Dihapus!');
    return redirect()->to('/wilayah');
  }
}
