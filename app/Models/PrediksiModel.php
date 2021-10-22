<?php

namespace App\Models;

use CodeIgniter\Model;

class PrediksiModel extends Model
{
  protected $table = "tb_prediksi";
  protected $primaryKey = "id_prediksi";
  protected $returnType = "array";
  // protected $useTimestamps = true;
  protected $allowedFields = ['id_periode', 'kode_wilayah', 'jumlah_penduduk'];


  public function get_prediksi()
  {
    return $this->db->table('tb_prediksi')
      ->join('tb_wilayah', 'tb_wilayah.kode_wilayah = tb_prediksi.kode_wilayah')
      ->join('tb_periode', 'tb_periode.id_periode = tb_prediksi.id_periode')
      ->get()->getResultArray();
  }
}
