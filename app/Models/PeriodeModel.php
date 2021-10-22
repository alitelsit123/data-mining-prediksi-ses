<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
  protected $table = "tb_periode";
  protected $primaryKey = "id_periode";
  protected $returnType = "array";
  // protected $useTimestamps = true;
  protected $allowedFields = ['id_periode', 'tahun'];

  public function get_periode()
  {
    return $this->db->table('tb_periode')->get()->getResultArray();
  }

  public function insert_periode($data)
  {
    return $this->db->table('tb_periode')->insert($data);
  }

  public function edit_periode($id_periode)
  {
    return $this->db->table('tb_periode')->where('id_periode', $id_periode)->get()->getRowArray();
  }

  public function update_periode($data, $id_periode)
  {
    return $this->db->table('tb_periode')->update($data, array('id_periode' => $id_periode));
  }

  public function delete_periode($id_periode)
  {
    return $this->db->table('tb_periode')->delete(array('id_periode' => $id_periode));
  }
}
