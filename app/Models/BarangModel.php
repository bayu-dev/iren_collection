<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_barang', 'nama_barang', 'jenis_barang',];

    public function rules()
    {
        return
            [
                'nama_barang' =>
                [
                    'label'  => 'Nama Barang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'kategori_barang' =>
                [
                    'label'  => 'Jenis Barang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],

                'harga' =>
                [
                    'label'  => 'Harga Barang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],

                'deskripsi' =>
                [
                    'label'  => 'Deskripsi Barang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getBarang()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_barang' => $id])->first();
    }

    public function getDasboardBarang()
    {
        $builder = $this->db->table('barang');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getIdBarang($id_barang)
    {
        $builder = $this->db->table('barang');
        $builder->where('id_barang', $id_barang);
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function getListBarang()
    {
        $builder = $this->db->table('barang');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_barang_ID()
    {
        $builder = $this->db->table('barang');
        $builder->selectMax('id_barang', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_barang = 'PRD-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_barang = $id_barang . $nomor;
        return $id_barang;
    }



    public function createBarang($data)
    {
        $query = $this->db->table('barang')->insert($data);
        return $query;
    }

    public function updateBarang($data, $id)
    {
        $query = $this->db->table('barang')->update($data, array('id_barang' => $id));
        return $query;
    }

    public function deleteBarang($id)
    {
        $query = $this->db->table('barang')->delete(array('id_barang' => $id));
        return $query;
    }
}
