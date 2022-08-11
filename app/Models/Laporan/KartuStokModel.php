<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class KartuStokModel extends Model
{
    protected $table      = 'laporan_kartu_stok';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_stok', 'id_barang', 'tanggal', 'pembelian_unit', 'pembelian_harga', 'pembelian_total', 'pemakaian_unit', 'pemakaian_harga', 'pemakaian_total', 'unit_akhir', 'harga_akhir', 'total_akhir'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getKartuStok($month = '', $year = '', $id_barang = '')
    {
        $builder = $this->db->table('laporan_kartu_stok');
        $builder->select('*');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->where('id_barang', $id_barang);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getLastStok($month = '', $year = '', $id_barang = '')
    {
        $builder = $this->db->table('laporan_kartu_stok');
        $builder->select('*');
        $builder->where('month(tanggal) <=', $month);
        $builder->where('year(tanggal) <=', $year);
        $builder->where('id_barang', $id_barang);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        return $query->getLastRow();
    }

    public function code_stok_IDK()
    {
        $builder = $this->db->table('laporan_kartu_stok');
        $builder->selectMax('id_stok', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_stok = 'STK-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_stok = $id_stok . $nomor;
        return $id_stok;
    }

    public function createKartuStok($data)
    {
        $query = $this->db->table('laporan_kartu_stok')->insert($data);
        return $query;
    }

    public function updateStokSisa($id_barang, $tanggal)
    {
        $date = date("Y-m-d", strtotime($tanggal));
        $pmb = $this->db->table('laporan_kartu_stok');
        $pmb->where('id_barang', $id_barang);
        $pmb->where('tanggal', $date);
        $list   = $pmb->get()->getResultArray();

        $pembelian_unit = 0;
        $pembelian_harga = 0;
        foreach ($list as $data) {
            $pembelian_unit     += $data['pembelian_unit'];
            $pembelian_harga     += $data['pembelian_harga'];
        }

        $unit_akhir = $pembelian_unit;
        $harga_akhir = $pembelian_harga;
        $total_akhir = $unit_akhir * $harga_akhir;

        $builder = $this->db->table('laporan_kartu_stok');
        $builder->where('id_barang', $id_barang);
        $builder->where('tanggal', $date);
        $builder->groupBy('id_barang');
        $builder->orderBy('id', 'desc');
        $builder->limit(1);
        $builder->set('unit_akhir', $unit_akhir);
        $builder->set('harga_akhir', $harga_akhir);
        $builder->set('total_akhir', $total_akhir);
        $query = $builder->update();
        return $query;
    }
}
