<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'alamat', 'no_telp'];

    public function rules()
    {
        return
            [
                'nama_kategori' =>
                [
                    'label'  => 'Nama Kategori',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
            ];
    }

    public function getKategori()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_kategori' => $id])->first();
    }


    public function code_kategori_ID()
    {
        $builder = $this->db->table('kategori');
        $builder->selectMax('id_kategori', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_kategori = 'KTG-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_kategori = $id_kategori . $nomor;
        return $id_kategori;
    }

    public function createKategori($data)
    {
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }

    public function updateKategori($data, $id)
    {
        $query = $this->db->table('kategori')->update($data, array('id_kategori' => $id));
        return $query;
    }

    public function deleteKategori($id)
    {
        $query = $this->db->table('kategori')->delete(array('id_kategori' => $id));
        return $query;
    }
}
