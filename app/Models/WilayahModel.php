<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
  protected $table = "tb_wilayah";
  protected $primaryKey = "kode_wilayah";
  protected $returnType = "array";
  // protected $useTimestamps = true;
  protected $allowedFields = ['kode_wilayah', 'nama_wilayah'];

  public function get_wilayah()
  {
    return $this->db->table('tb_wilayah')->get()->getResultArray();
  }

  public function insert_wilayah($data)
  {
    return $this->db->table('tb_wilayah')->insert($data);
  }

  public function edit_wilayah($kode_wilayah)
  {
    return $this->db->table('tb_wilayah')->where('kode_wilayah', $kode_wilayah)->get()->getRowArray();
  }

  public function update_wilayah($data, $kode_wilayah)
  {
    return $this->db->table('tb_wilayah')->update($data, array('kode_wilayah' => $kode_wilayah));
  }

  public function delete_wilayah($kode_wilayah)
  {
    return $this->db->table('tb_wilayah')->delete(array('kode_wilayah' => $kode_wilayah));
  }
}
