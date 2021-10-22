<?php

namespace App\Controllers;

use App\Models\PrediksiModel;
use App\Models\WilayahModel;
use App\Models\PeriodeModel;
use App\Models\AktualModel;

class Prediksi extends BaseController
{
  protected $prediksi;

  function __construct()
  {
    $this->prediksi = new PrediksiModel();
    $this->wilayah = new WilayahModel();
    $this->periode = new PeriodeModel();
    $this->aktual = new AktualModel();
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
    $data['prediksi'] = $this->prediksi->get_prediksi();

    $query_wilayah = $this->wilayah->get_wilayah();

    $data = array(
      'wilayah' => $query_wilayah,
    );

    echo view('layout/header');
    echo view('layout/sidebar');
    return view('prediksi/index', $data);
    echo view('layout/footer');
  }

  public function hasil()
  {
    if (!isset($_GET['pilih_alpha'])) {
      return redirect()->to('/prediksi');
    }
    // $data['wilayah'] = $this->wilayah->get_wilayah();
    $wilayah = $this->request->getGet('nama_wilayah');
    $alpha = $this->request->getGet('pilih_alpha');
    $periode = $this->request->getGet('pilih_periode');


    $dataAktual = $this->prediksi
      ->join('tb_wilayah', 'tb_wilayah.kode_wilayah=tb_prediksi.kode_wilayah')
      ->join('tb_periode', 'tb_prediksi.id_periode=tb_periode.id_periode')
      ->where('tb_prediksi.kode_wilayah', $wilayah)
      ->orderBy('tb_periode.tahun', 'ASC')
      ->find();
    // dd($dataWilayah);

    $hs = array_map(function ($item) use ($alpha) {
      $r = [];
      foreach ($item as $k => $v) {
        $r[$k] = $v;
      }
      $r['alpha'] = $alpha;
      $r['err'] = 0;
      $r['n1'] = 1 - $alpha;
      $r['sum'] = $alpha * $item['jumlah_penduduk'];
      $r['absErr'] = 0;
      $r['sqrErr'] = 0;
      $r['errYt'] = 0;
      $r['ft'] = 0;
      return $r;
    }, $dataAktual);

    $hs = $this->serialize($alpha, $hs);

    $hs = $this->final($hs, $periode);

    $cart = array_map(function ($item) {
      return ceil($item['jumlah_penduduk']);
    }, $hs);

    $ths = array_map(function ($item) {
      return ceil($item['tahun']);
    }, $hs);

    $mad = array_reduce(array_map(function ($item) {
      return round($item['absErr'], 2);
    }, $hs), function ($e, $i) {
      $e += $i;
      return $e;
    }) / (sizeof($hs) - 1);

    $mse = array_reduce(array_map(function ($item) {
      return round($item['sqrErr'], 2);
    }, $hs), function ($e, $i) {
      $e += $i;
      return $e;
    }) / (sizeof($hs) - 1);

    $rmse = sqrt($mse);

    $mape = array_reduce(array_map(function ($item) {
      return round($item['errYt'], 2);
    }, $hs), function ($e, $i) {
      $e += $i;
      return $e;
    }) / (sizeof($hs) - 1);

    $extra = [
      'MAD' => round($mad, 2),
      'MSE' => round($mse, 2),
      'RMSE' => round($rmse, 2),
      'MAPE' => round($mape, 4)
    ];

    // var_dump($extra);
    // return;

    if (count($dataAktual) < 1) {
      session()->setFlashdata('message', sweetAlert('Upss!', 'Data Tidak Ditemukan.', 'warning'));
      return redirect()->to('/prediksi');
    } else {
      $data = [
        'dataAktual' => $hs,
        'cart' => $cart,
        'ths' => $ths,
        'extra_count' => 0,
        'extras' => $extra
      ];
      echo view('layout/header');
      echo view('layout/sidebar');
      return view('prediksi/hasil', $data);
      echo view('layout/footer');
    }
  }
  function hitung($a, $b, $c)
  {
    $result = ($a * $b) + (1 - $a) * $c;

    return $result;
  }
  function serialize($alpha, $hs)
  {
    for ($i = 0; $i < sizeof($hs); $i++) {
      if ($i == 0) {
        $r = $this->hitung($alpha, $hs[0]['jumlah_penduduk'], $hs[0]['jumlah_penduduk']);
      } else {
        $r = $this->hitung($alpha, $hs[$i - 1]['jumlah_penduduk'], $hs[$i - 1]['ft']);
      }

      $hs[$i]['ft'] = $r;
      $hs[$i]['err'] = $hs[$i]['jumlah_penduduk'] - $r;
      $hs[$i]['absErr'] = abs($hs[$i]['err']);
      $hs[$i]['sqrErr'] = pow($hs[$i]['absErr'], 2);
      $hs[$i]['errYt'] = round($hs[$i]['absErr'] / $hs[$i]['jumlah_penduduk'], 4);
    }

    return $hs;
  }
  function final($hs, $periode = 0)
  {
    if ($periode > 0) {
      $copy = $hs;
      for ($i = 0; $i < $periode; $i++) {
        $lastIndex = sizeof($copy) - 1;
        $last = $copy[$lastIndex];
        $new = $last;
        $new['jumlah_penduduk'] = $new['ft'];
        $new['id_prediksi'] = (int)$new['id_prediksi'] + 1;
        $new['tahun'] = (int)$new['tahun'] + 1;
        array_push($copy, $new);
        $copy = $this->serialize($new['alpha'], $copy);
      }
      return $copy;
    }
    return $hs;
  }
}
