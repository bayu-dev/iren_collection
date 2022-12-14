<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\BukuBesarModel;
use \App\Models\CoaModel;


class BukuBesar extends BaseController
{
    protected $bukuBesarModel;
    protected $coaModel;

    public function __construct()
    {
        $this->bukuBesarModel = new BukuBesarModel();
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar(),
            'list_akun'             => $this->coaModel->getListAkun(),
            'posisi_saldo_normal'   => '',
            'saldo_awal'            => 0,
            'date'                  => '',
            'year'                  => '',
            'id_akun'               => '',
            'nama_akun'             => '',
        ];
        return view('laporan/view_data_buku_besar', $data);
    }

    public function show_data_buku_besar()
    {
        $akun           = $this->request->getPost('id_akun');
        $tanggal        = $this->request->getPost('start_date');
        $start_date     = date("Y-m-d", strtotime($tanggal));
        $time           = strtotime($start_date);
        $month          = date("m", $time);
        $year           = date("Y", $time);
        $bulan          = date("F", $time);
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar($akun, $month, $year),
            'list_akun'             => $this->coaModel->getListAkun(),
            'posisi_saldo_normal'   => $this->bukuBesarModel->getPosisiSaldoNormal($akun),
            'saldo_awal'            => $this->bukuBesarModel->getSaldoAwalBukuBesar($year, $month, $akun),
            'date'                  => $bulan,
            'year'                  => $year,
            'id_akun'               => $akun,
            'nama_akun'             => $this->coaModel->where('id_akun', $akun)->get()->getFirstRow()->nama_akun
        ];
        // dd($data);
        return view('laporan/view_data_buku_besar', $data);
    }
}
