<?php

namespace App\Controllers;

use App\Models\AktualModel;
use App\Models\WilayahModel;
use App\Models\PeriodeModel;
use stdClass;

class Aktual extends BaseController
{
  protected $aktual;

  function __construct()
  {
    $this->aktual = new AktualModel();
    $this->periode = new PeriodeModel();
    $this->wilayah = new WilayahModel();
  }

  public function index()
  {
    $data['aktual'] = $this->aktual->get_aktual();
    // dd($data);

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('aktual/index', $data);
    echo view('layout/footer');
  }

  public function create()
  {
    $query_periode = $this->periode->get_periode();
    $query_wilayah = $this->wilayah->get_wilayah();
    $jumlah_penduduk = $this->aktual->get_aktual();

    $data = array(
      'periode' => $query_periode,
      'wilayah' => $query_wilayah,
      'jumlah_penduduk' => $jumlah_penduduk
    );


    echo view('layout/header');
    echo view('layout/sidebar');
    return view('aktual/create', $data);
    echo view('layout/footer');
  }

  public function save()
  {


    $jumlah_penduduk = $this->aktual->get_aktual();
    $data['periode'] = $this->periode->get_periode();
    $data['wilayah'] = $this->wilayah->get_wilayah();

    //$data=array('select_option'=>$this->model_aduan->get_layanan());

    $query_periode = $this->periode->get_periode();
    $query_wilayah = $this->wilayah->get_wilayah();
    $jumlah_penduduk = $this->aktual->get_aktual();

    $data = array(
      'id_periode' => $this->request->getPost('tahun'),
      'kode_wilayah' => $this->request->getPost('nama_wilayah'),
      'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk')

    );
    $aktualModel = new AktualModel();
    if ($aktualModel->insert($data)) {
      session()->setFlashdata('message', sweetAlert('Berhasil!', 'Data telah diinput.', 'success'));
    } else {
      session()->setFlashdata('message', sweetAlert('Gagal!', 'Data gagal diinput.', 'error'));
    }
    // dd($data);
    //$this->load->view('home', $data);
    // $this->aktual->insert_aktual($data, 'aktual');
    return redirect()->to('/aktual');

    // $data['aktual'] = $this->aktual->get_aktual();
    // echo view('layout/header');
    // echo view('layout/sidebar');
    // return view('aktual/create', $data);
    // echo view('layout/footer');
  }
  // public function save()
  // {
  // $data = [
  //   [
  //     'tahun' => $this->request->getPost('tahun'),
  //     'nama_wilayah' => $this->request->getPost('nama_wilayah'),
  //     'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk')
  //   ],

  //   [
  //     'tahun' => $tahun,
  //     'nama_wilayah' => $nama_wilayah,
  //     'jumlah_penduduk' => $jumlah_penduduk
  //   ]
  // ];
  // $data['aktual'] = $this->aktual->insert_aktual(
  //   [
  //     'tahun' => $this->request->getPost('tahun'),
  //     'nama_wilayah' => $this->request->getPost('nama_wilayah'),
  //     'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk')
  //   ]
  // [
  //   'tahun' => $tahun,
  //   'nama_wilayah' => $nama_wilayah,
  //   'jumlah_penduduk' => $jumlah_penduduk
  // ]
  //   );
  //   dd($data);
  //   exit;

  //   $this->aktual->insert_aktual($data, 'tb_prediksi');
  //   return redirect()->to('/aktual');
  // }
  function edit($id_prediksi)
  {
    $dataAktual = $this->aktual
      ->join('tb_wilayah tw', 'tw.kode_wilayah=tb_prediksi.kode_wilayah')
      ->find($id_prediksi);
    if (empty($dataAktual)) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
    }
    $data['aktual'] = $dataAktual;
    $data['periode'] = $this->periode->findAll();
    $data['wilayah'] = $this->wilayah->findAll();
    // dd($data);
    echo view('layout/header');
    echo view('layout/sidebar');
    return view('aktual/edit', $data);
    echo view('layout/footer');
  }

  public function update($id_prediksi)
  {
    // $this->aktual->update($id_prediksi, [
    //   'id_periode' => $this->request->getPost('tahun'),
    //   'kode_wilayah' => $this->request->getPost('nama_wilayah'),
    //   'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk')
    // ]);

    $data = array(
      'id_periode' => $this->request->getPost('tahun'),
      'kode_wilayah' => $this->request->getPost('nama_wilayah'),
      'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk')

    );
    $aktualModel = new AktualModel();
    if ($aktualModel->update($id_prediksi, $data)) {
      session()->setFlashdata('message', sweetAlert('Berhasil!', 'Data telah diupdate.', 'success'));
    } else {
      session()->setFlashdata('message', sweetAlert('Gagal!', 'Data gagal diupdate.', 'error'));
    }
    // dd($data);

    return redirect()->to('/aktual');
  }

  function delete($id_prediksi)
  {
    $dataAktual = $this->aktual->find($id_prediksi);
    if (empty($dataAktual)) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Aktual Tidak ditemukan !');
    }

    if ($this->aktual->delete($id_prediksi)) {
      session()->setFlashdata('message', sweetAlert('Berhasil!', 'Data telah dihapus.', 'success'));
    } else {
      session()->setFlashdata('message', sweetAlert('Gagal!', 'Data gagal dihapus.', 'error'));
    }
    return redirect()->to('/aktual');
  }
}
