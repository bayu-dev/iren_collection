<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\KartuStokModel;
use \App\Models\BarangModel;


class KartuStok extends BaseController
{
    protected $kartustokModel;
    protected $barangModel;

    public function __construct()
    {
        $this->kartustokModel = new KartuStokModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Kartu Stok',
            'kartu_stok'        => $this->kartustokModel->getKartuStok(),
            'produk'            => $this->barangModel->getBarang(),
            'date'              => '',
            'year'              => '',
            'aktiva'            => [],
            'last_stok'         => [],
            'barang'            => [],
        ];

        return view('laporan/view_data_kartu_stok', $data);
    }

    public function show_data_kartu_stok()
    {
        $start_date             = date("Y-m-d", strtotime($this->request->getPost('start_date')));
        $id_barang              = $this->request->getPost('id_barang');
        $time                   = strtotime($start_date);
        $month                  = date("m", $time);
        $year                   = date("Y", $time);
        $bulan                  = date("F", $time);
        $month_before           = date('m', strtotime($this->request->getPost('start_date') . ' - 1 month'));

        $data = [
            'title'             => 'Kartu Stok',
            'kartu_stok'        => $this->kartustokModel->getKartuStok($month, $year, $id_barang),
            'last_stok'         => $this->kartustokModel->getLastStok($month_before, $year, $id_barang),
            'date'              => $bulan,
            'produk'            => $this->barangModel->getBarang(),
            'year'              => $year,
            'barang'            => $this->barangModel->where(['id_barang' => $id_barang])->first()
        ];

        // dd($data);

        return view('laporan/view_data_kartu_stok', $data);
    }
}
