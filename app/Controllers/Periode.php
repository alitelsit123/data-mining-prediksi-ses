<?php

namespace App\Controllers;

use App\Models\PeriodeModel;

class Periode extends BaseController
{
  protected $periode;

  function __construct()
  {
    $this->periode = new PeriodeModel();
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
    $data['periode'] = $this->periode->get_periode();

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('periode/index', $data);
    echo view('layout/footer');
  }

  public function create()
  {
    echo view('layout/header');
    echo view('layout/sidebar');
    return view('periode/create');
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
    $data['periode'] = $this->periode->insert_periode([
      'id_periode' => $this->request->getPost('id_periode'),
      'tahun' => $this->request->getPost('tahun')
    ]);

    return redirect()->to('/periode');
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
  public function edit($id_periode)
  {
    $data['periode'] = $this->periode->edit_periode($id_periode);

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('periode/edit', $data);
    echo view('layout/footer');
  }

  public function update($id_periode)
  {
    $data = [
      'id_periode' => $this->request->getPost('id_periode'),
      'tahun' => $this->request->getPost('tahun')
    ];

    $this->periode->update_periode($data, $id_periode);
    session()->setFlashdata('message', 'Data Periode Berhasil Diupdate!');
    return redirect()->to('/periode');
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
  function delete($id_periode)
  {
    // $dataWilayah = $this->wilayah->find($kode_wilayah);
    // if (empty($dataWilayah)) {
    //   throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
    // }
    // $this->periode->delete_periode($id_periode);
    // session()->setFlashdata('message', 'Data Periode Berhasil Dihapus!');
    // return redirect()->to('/periode');

    $dataPeriode = $this->periode->find($id_periode);
    if (empty($dataPeriode)) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Aktual Tidak ditemukan !');
    }

    if ($this->periode->delete($id_periode)) {
      session()->setFlashdata('message', sweetAlert('Berhasil!', 'Data telah dihapus.', 'success'));
    } else {
      session()->setFlashdata('message', sweetAlert('Gagal!', 'Data gagal dihapus.', 'error'));
    }
    return redirect()->to('/aktual');
  }
}
