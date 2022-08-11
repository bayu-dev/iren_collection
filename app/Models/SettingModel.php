<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table      = 'setting';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_toko', 'lokasi', 'alamat_toko', 'no_telp'];

    public function getSetting()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateSetting($data, $id)
    {
        $query = $this->db->table('akun')->update($data, array('id_akun' => $id));
        return $query;
    }

}
