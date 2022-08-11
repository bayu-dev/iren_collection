<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table      = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $allowedFields = ['id_penjualan', 'id_barang',  'tanggal_penjualan', 'status', 'id_transaksi'];

    public function getPenjualan()
    {
        $builder = $this->db->table('penjualan');
        $builder->select('penjualan.*');
        $builder->join('detail_penjualan', 'detail_penjualan.id_penjualan=penjualan.id_penjualan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getById($id)
    {
        return $this->where(['id_penjualan' => $id])->first();
    }

    public function getCountData($id_penjualan)
    {
        $builder = $this->db->table('penjualan');
        $builder->where('penjualan.id_penjualan', $id_penjualan);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getDasboardPenjualan()
    {
        $builder = $this->db->table('penjualan');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getIdPenjualan($id_penjualan)
    {
        $id_penjualan = '';
        $builder = $this->db->table('penjualan');
        $builder->select('id_penjualan');
        $query = $builder->get()->getResultArray();
        foreach ($query as $data) :
            $id_penjualan = $data['id_penjualan'];
        endforeach;

        return $id_penjualan;
    }

    public function getHargaBarang($id_barang)
    {
        $builder = $this->db->table('barang');
        $builder->select('harga');
        $builder->where('id_barang', $id_barang);
        $query = $builder->get()->getResultArray();
        foreach ($query as $data) :
            $harga_satuan = $data['harga'];
        endforeach;

        return $harga_satuan;
    }

    public function getTotalPenjualan($id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->select('harga_satuan,jumlah_jual');
        $builder->where('id_penjualan', $id_penjualan);
        $query = $builder->get()->getResultArray();
        $total_harga = 0;
        foreach ($query as $data) :
            $total_harga += $data['harga_satuan'] * $data['jumlah_jual'];
        endforeach;

        return $total_harga;
    }

    public function getTotalHpp($id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->select('hpp,jumlah_jual');
        $builder->where('id_penjualan', $id_penjualan);
        $query = $builder->get()->getResultArray();
        $total_harga = 0;
        foreach ($query as $data) :
            $total_harga += $data['hpp'] * $data['jumlah_jual'];
        endforeach;

        return $total_harga;
    }

    public function updateDiskon($data, $id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->where('id_penjualan', $id_penjualan);
        $builder->set('diskon', 'diskon+' . $data, false);
        $query = $builder->update();
        return $query;
    }

    public function getDetailPenjualan($id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->join('penjualan', 'detail_penjualan.id_penjualan=penjualan.id_penjualan');
        $builder->join('barang', 'barang.id_barang=detail_penjualan.id_barang');
        $builder->where('detail_penjualan.id_penjualan', $id_penjualan);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getLapPenjualan($month = '', $year = '')
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->select("detail_penjualan.*,barang.nama_barang,penjualan.id_penjualan,DATE_FORMAT(penjualan.tanggal_penjualan,'%Y-%m-%d') as tanggal_penjualan");
        $builder->join('penjualan', 'detail_penjualan.id_penjualan=penjualan.id_penjualan');
        $builder->join('barang', 'detail_penjualan.id_barang=barang.id_barang');
        $builder->where('month(tanggal_penjualan)', $month);
        $builder->where('year(tanggal_penjualan)', $year);
        $query = $builder->get();
        return $query->getResult();
    }

    public function code_penjualan_ID()
    {
        $builder = $this->db->table('penjualan');
        $builder->selectMax('id_penjualan', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_penjualan = 'PNJ-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_penjualan = $id_penjualan . $nomor;
        return $id_penjualan;
    }

    public function createPenjualan($data)
    {
        $query = $this->db->table('penjualan')->insert($data);
        return $query;
    }

    public function createDetailPenjualan($data)
    {
        $query = $this->db->table('detail_penjualan')->insert($data);
        return $query;
    }

    public function deletePenjualan($id)
    {
        $query = $this->db->table('penjualan')->delete(array('id_penjualan' => $id));
        return $query;
    }

    public function deleteDetailPenjualan($id)
    {
        $query = $this->db->table('detail_penjualan')->delete(array('id_detail_penjualan' => $id));
        return $query;
    }
}
