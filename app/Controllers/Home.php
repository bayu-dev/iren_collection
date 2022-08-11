<?php

namespace App\Controllers;

use \App\Models\PenjualanModel;
use \App\Models\BarangModel;
use \App\Models\PembelianModel;
use \App\Models\SupplierModel;



class Home extends BaseController
{

    protected $penjualanModel;
    protected $pembelianModel;
    protected $barangModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->penjualanModel = new PenjualanModel();
        $this->pembelianModel = new PembelianModel();
        $this->barangModel = new BarangModel();
        $this->supplierModel = new SupplierModel();
    }

    function user()
    {
        $authenticate = service('authentication');
        $authenticate->check();
        return $authenticate->user();
    }

    public function index()
    {
        $data = [
            'title'             => 'Dashboard',
            'total_pembelian'   => $this->pembelianModel->getDasboardPembelian(),
            'total_penjualan'   => $this->penjualanModel->getDasboardPenjualan(),
            'total_barang'      => $this->barangModel->getDasboardBarang(),
            'total_supplier'    => $this->supplierModel->getDasboardSupplier(),
        ];
        return view('home/index', $data);
    }
}
