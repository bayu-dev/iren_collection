<?php

namespace App\Controllers;

use \App\Models\PembelianModel;
use \App\Models\BarangModel;
use \App\Models\Laporan\KartuStokModel;
use \App\Models\Laporan\JurnalModel;
use App\Models\SupplierModel;

class Pembelian extends BaseController
{
    protected $validation;
    protected $session;
    protected $pembelianModel;
    protected $barangModel;
    protected $supplierModel;
    protected $jurnalModel;
    protected $kartuStokModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->pembelianModel = new PembelianModel();
        $this->barangModel = new BarangModel();
        $this->supplierModel = new SupplierModel();
        $this->jurnalModel = new JurnalModel();
        $this->kartuStokModel = new KartuStokModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Pembelian',
            'pembelian'             => $this->pembelianModel->getPembelian(),
        ];
        // dd($data);
        return view('pembelian/view_data_pembelian', $data);
    }

    public function add()
    {
        $data = [
            'title'                       => 'Tambah Data Pembelian',
            'id_pembelian'                => $this->pembelianModel->code_pembelian_ID(),
            'supplier'                    => $this->supplierModel->getSupplier(),
            'barang'                      => $this->barangModel->getBarang(),

        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        $id_pembelian                   = $this->pembelianModel->code_pembelian_ID();
        $id_supplier                    = $this->request->getPost("id_supplier");
        $tanggal                        = $this->request->getPost("tanggal");
        $originalDate                   = $tanggal;
        $newDate                        = date("Y-m-d", strtotime($originalDate));
        $year                           = date("Y", strtotime($originalDate));
        $month                          = date("m", strtotime($originalDate));
        $id_barang                      = $this->request->getPost('id_barang');
        $jumlah_beli                    = $this->request->getPost('jumlah_beli');
        $harga_satuan                   = $this->request->getPost('harga_satuan');
        $id_stok                        = $this->kartuStokModel->code_stok_IDK();

        if ($isDataValid) {
            $data_pembelian = array(
                'id_pembelian'          => $id_pembelian,
                'id_supplier'           => $id_supplier,
                'tanggal_pembelian'     => $newDate,
                'status'                => 'LUNAS',
            );

            $this->pembelianModel->createPembelian($data_pembelian);

            $data_detail_pembelian = array(
                'id_pembelian'          => $id_pembelian,
                'id_barang'             => $id_barang,
                'id_supplier'           => $id_supplier,
                'harga_satuan'          => $harga_satuan,
                'jumlah_beli'           => $jumlah_beli,
                'id_stok'               => $id_stok,
            );

            $this->pembelianModel->createDetailPembelian($data_detail_pembelian);
            $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
            $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();
            $total_pembelian        = $this->pembelianModel->getTotalPembelian($id_pembelian);
            $id_transaksi           = $this->pembelianModel->where('id_pembelian', $id_pembelian)->first();

            //insert jurnal
            $jurnal = [
                [
                    'id_jurnal'     => $id_jurnalD,
                    'tanggal'       => $newDate,
                    'id_akun'       => 113,
                    'nominal'       => $total_pembelian,
                    'posisi'        => 'd',
                    'debet'         => $total_pembelian,
                    'kredit'        => 0,
                    'reff'          => $id_pembelian,
                    'transaksi'     => 'Pembelian',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
                [
                    'id_jurnal'     => $id_jurnalK,
                    'tanggal'       => $newDate,
                    'id_akun'       => 111,
                    'nominal'       => $total_pembelian,
                    'posisi'        => 'k',
                    'debet'         => 0,
                    'kredit'        => $total_pembelian,
                    'reff'          => $id_pembelian,
                    'transaksi'     => 'Pembelian',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
            ];

            $this->jurnalModel->createOrderJurnal($jurnal);

            $kartu_stok_before = $this->kartuStokModel->getLastStok($month, $year, $this->request->getPost('id_barang'));
            if ($kartu_stok_before) {
                $unit_akhir = $jumlah_beli + $kartu_stok_before->unit_akhir;
                $total_akhir = $total_pembelian + $kartu_stok_before->total_akhir;
                $harga_akhir = $total_akhir / $unit_akhir;
                $kartu = array(
                    'id_stok'                   => $id_stok,
                    'id_barang'                 => $this->request->getPost('id_barang'),
                    'tanggal'                   => $newDate,
                    'pembelian_unit'            => $jumlah_beli,
                    'pembelian_harga'           => $harga_satuan,
                    'pembelian_total'           => $total_pembelian,
                    'unit_akhir'                => $unit_akhir,
                    'harga_akhir'               => $harga_akhir,
                    'total_akhir'               => $total_akhir,
                );
            } else {
                $kartu = array(
                    'id_stok'                   => $id_stok,
                    'id_barang'                 => $this->request->getPost('id_barang'),
                    'tanggal'                   => $newDate,
                    'pembelian_unit'            => $jumlah_beli,
                    'pembelian_harga'           => $harga_satuan,
                    'pembelian_total'           => $total_pembelian,
                    'unit_akhir'                => $jumlah_beli,
                    'harga_akhir'               => $harga_satuan,
                    'total_akhir'               => $total_pembelian,
                );
            }

            $this->kartuStokModel->createKartuStok($kartu);


            unset($_SESSION['id_pembelian']);
            unset($_SESSION['id_supplier']);
            unset($_SESSION['tanggal']);
            session()->setFlashdata('success', 'Data Pembelian Berhasil Disimpan');
            return redirect()->to('/pembelian');
        }
        return view('pembelian/add_data_pembelian', $data);
    }

    public function fetch_harga()
    {
        $id_barang      = $this->request->getPost('id_barang_pembelian');
        $harga          = $this->pembelianModel->getHargaBarang($id_barang);

        echo json_encode($harga);
    }

    public function detail($id_pembelian)
    {
        $data = [
            'title'                 => 'Data Detail Pembelian',
            'detail_pembelian'      => $this->pembelianModel->getDetailPembelian($id_pembelian)
        ];
        return view('pembelian/view_data_detail_pembelian', $data);
    }

    public function deleteDetail()
    {
        $id_detail_pembelian            = $this->request->getPost('id_detail_pembelian');

        $this->pembelianModel->deleteDetailPembelian($id_detail_pembelian);
        session()->setFlashdata('success', 'Data Keranjang Berhasil Dihapus');

        return redirect()->to('/pembelian/addDetail');
    }
}
