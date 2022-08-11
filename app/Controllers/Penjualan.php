<?php

namespace App\Controllers;

use \App\Models\PenjualanModel;
use \App\Models\BarangModel;
use \App\Models\Laporan\JurnalModel;
use \App\Models\Laporan\KartuStokModel;

class Penjualan extends BaseController
{
    protected $validation;
    protected $session;
    protected $penjualanModel;
    protected $barangModel;
    protected $jurnalModel;
    protected $kartuStokModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->penjualanModel = new PenjualanModel();
        $this->barangModel = new BarangModel();
        $this->jurnalModel = new JurnalModel();
        $this->kartuStokModel = new KartuStokModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Penjualan',
            'penjualan'             => $this->penjualanModel->getPenjualan(),
        ];
        return view('penjualan/view_data_penjualan', $data);
    }

    public function add()
    {
        $data = [
            'title'                      => 'Tambah Data Penjualan',
            'id_penjualan'               => $this->penjualanModel->code_penjualan_ID(),
        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data_session = array(
                'id_penjualan'                      => $this->penjualanModel->code_penjualan_ID(),
                'tanggal'                           => $this->request->getPost('tanggal'),
            );
            $this->session->set($data_session);
            return redirect()->to('/penjualan/addDetail');
        }
        return view('penjualan/add_data_penjualan', $data);
    }

    public function addDetail()
    {
        $id_penjualan                       = $this->session->get("id_penjualan");
        $tanggal                            = $this->session->get("tanggal");
        $originalDate                       = $tanggal;
        $newDate                            = date("Y-m-d", strtotime($originalDate));
        $year                               = date("Y", strtotime($originalDate));
        $month                              = date("m", strtotime($originalDate));

        $data = [
            'title'                         => 'Tambah Data Detail Penjualan',
            'barang'                        => $this->barangModel->getBarang(),
            'detail_penjualan'              => $this->penjualanModel->getDetailPenjualan($id_penjualan),
        ];

        $this->validation->setRules(['jumlah_jual' => 'required']);
        $isDataValid                        = $this->validation->withRequest($this->request)->run();
        $id_barang                          = $this->request->getPost('id_barang');
        $jumlah_jual                        = $this->request->getPost('jumlah_jual');
        $hpp                                = $this->request->getPost('harga_satuan');
        $harga_satuan                       = $this->request->getPost('hpp');
        $id_stok                            = $this->kartuStokModel->code_stok_IDK();
        $kartu_stok_before                  = $this->kartuStokModel->getLastStok($month, $year, $id_barang);

        if ($isDataValid) {

            $jumlah_data = $this->penjualanModel->getCountData($id_penjualan);


            // dd($jumlah_data);

            if ($jumlah_data == 0) {

                $data_penjualan = array(
                    'id_penjualan'          => $id_penjualan,
                    'tanggal_penjualan'     => $newDate,
                );

                $this->penjualanModel->createPenjualan($data_penjualan);

                $data_detail_penjualan = array(
                    'id_penjualan'          => $id_penjualan,
                    'id_barang'             => $id_barang,
                    'hpp'                   => $hpp,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_jual'           => $jumlah_jual,
                    'id_stok'               => $id_stok,
                );

                $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);

                if ($kartu_stok_before) {
                    $harga_penjualan        = $kartu_stok_before->harga_akhir;
                    $unit_akhir             = $kartu_stok_before->unit_akhir - $jumlah_jual;
                    $kartu = array(
                        'id_stok'                   => $id_stok,
                        'id_barang'                 => $id_barang,
                        'tanggal'                   => $newDate,
                        'penjualan_unit'            => $jumlah_jual,
                        'penjualan_harga'           => $harga_penjualan,
                        'penjualan_total'           => $jumlah_jual * $harga_penjualan,
                        'unit_akhir'                => $unit_akhir,
                        'harga_akhir'               => $harga_penjualan,
                        'total_akhir'               => $unit_akhir * $harga_penjualan,
                    );
                    $this->kartuStokModel->createKartuStok($kartu);
                } else {
                    if (!empty($kartu_stok_before->harga_akhir)) {
                        $harga_penjualan        = $kartu_stok_before->harga_akhir;
                        $unit_akhir             = $kartu_stok_before->unit_akhir - $jumlah_jual;
                        $kartu = array(
                            'id_stok'                   => $id_stok,
                            'id_barang'                 => $id_barang,
                            'tanggal'                   => $newDate,
                            'penjualan_unit'            => $jumlah_jual,
                            'penjualan_harga'           => $harga_penjualan,
                            'penjualan_total'           => $jumlah_jual * $harga_penjualan,
                            'unit_akhir'                => $unit_akhir,
                            'harga_akhir'               => $harga_penjualan,
                            'total_akhir'               => $unit_akhir * $harga_penjualan,
                        );
                        $this->kartuStokModel->createKartuStok($kartu);
                    }
                }
            } else {
                $data_detail_penjualan = array(
                    'id_penjualan'          => $id_penjualan,
                    'id_barang'             => $id_barang,
                    'hpp'                   => $hpp,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_jual'           => $jumlah_jual,
                    'id_stok'               => $id_stok,
                );

                $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);

                if ($kartu_stok_before) {
                    $harga_penjualan        = $kartu_stok_before->harga_akhir;
                    $unit_akhir             = $kartu_stok_before->unit_akhir - $jumlah_jual;
                    $kartu = array(
                        'id_stok'                   => $id_stok,
                        'id_barang'                 => $id_barang,
                        'tanggal'                   => $newDate,
                        'penjualan_unit'            => $jumlah_jual,
                        'penjualan_harga'           => $harga_penjualan,
                        'penjualan_total'           => $jumlah_jual * $harga_penjualan,
                        'unit_akhir'                => $unit_akhir,
                        'harga_akhir'               => $harga_penjualan,
                        'total_akhir'               => $unit_akhir * $harga_penjualan,
                    );
                    $this->kartuStokModel->createKartuStok($kartu);
                } else {
                    if (!empty($kartu_stok_before->harga_akhir)) {
                        $harga_penjualan        = $kartu_stok_before->harga_akhir;
                        $unit_akhir             = $kartu_stok_before->unit_akhir - $jumlah_jual;
                        $kartu = array(
                            'id_stok'                   => $id_stok,
                            'id_barang'                 => $id_barang,
                            'tanggal'                   => $newDate,
                            'penjualan_unit'            => $jumlah_jual,
                            'penjualan_harga'           => $harga_penjualan,
                            'penjualan_total'           => $jumlah_jual * $harga_penjualan,
                            'unit_akhir'                => $unit_akhir,
                            'harga_akhir'               => $harga_penjualan,
                            'total_akhir'               => $unit_akhir * $harga_penjualan,
                        );
                        $this->kartuStokModel->createKartuStok($kartu);
                    }
                }
            }

            session()->setFlashdata('success', 'Data penjualan Berhasil Ditambahkan');
            return redirect()->to('/penjualan/addDetail');
        }

        return view('penjualan/add_data_detail_penjualan', $data);
    }

    public function fetch_harga()
    {
        $id_barang      = $this->request->getPost('id_barang_penjualan');
        $harga          = $this->penjualanModel->getHargaBarang($id_barang);

        echo json_encode($harga);
    }

    public function selesai()
    {
        $id_penjualan           = $this->session->get("id_penjualan");
        $tanggal                = $this->session->get("tanggal");
        $originalDate           = $tanggal;
        $newDate                = date("Y-m-d", strtotime($originalDate));
        $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
        $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();
        $total_penjualan        = $this->penjualanModel->getTotalPenjualan($id_penjualan);
        $total_penjualan_diskon = $total_penjualan - ($total_penjualan * 0.1);
        $total_hpp              = $this->penjualanModel->getTotalHpp($id_penjualan);
        $total_hpp_diskon       = $total_hpp - ($total_hpp * 0.1);
        $id_transaksi           = $this->penjualanModel->where('id_penjualan', $id_penjualan)->first();

        $total                  = $this->request->getPost("total");
        $total_jurnal           = $this->request->getPost("total_akhir");
        $diskon                 = $total - $total_jurnal;

        $this->penjualanModel->updateDiskon($diskon, $id_penjualan);

        if ($diskon > 0) {
            $jurnal1 = [
                [
                    'id_jurnal'     => $id_jurnalD,
                    'tanggal'       => $newDate,
                    'id_akun'       => 111,
                    'nominal'       => $total,
                    'posisi'        => 'd',
                    'debet'         => $total,
                    'kredit'        => 0,
                    'reff'          => $id_penjualan,
                    'transaksi'     => 'Penjualan',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
                [
                    'id_jurnal'     => $id_jurnalK,
                    'tanggal'       => $newDate,
                    'id_akun'       => 420,
                    'nominal'       =>  $total - $total_jurnal,
                    'posisi'        => 'k',
                    'debet'         => 0,
                    'kredit'        =>  $total - $total_jurnal,
                    'reff'          => $id_penjualan,
                    'transaksi'     => 'Penjualan',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
                [
                    'id_jurnal'     => $id_jurnalK,
                    'tanggal'       => $newDate,
                    'id_akun'       => 411,
                    'nominal'       => $total_jurnal,
                    'posisi'        => 'k',
                    'debet'         => 0,
                    'kredit'        => $total_jurnal,
                    'reff'          => $id_penjualan,
                    'transaksi'     => 'Penjualan',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
            ];

            $this->jurnalModel->createOrderJurnal($jurnal1);
        } else {
            $jurnal1 = [
                [
                    'id_jurnal'     => $id_jurnalD,
                    'tanggal'       => $newDate,
                    'id_akun'       => 111,
                    'nominal'       => $total,
                    'posisi'        => 'd',
                    'debet'         => $total,
                    'kredit'        => 0,
                    'reff'          => $id_penjualan,
                    'transaksi'     => 'Penjualan',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
                [
                    'id_jurnal'     => $id_jurnalK,
                    'tanggal'       => $newDate,
                    'id_akun'       => 411,
                    'nominal'       => $total_jurnal,
                    'posisi'        => 'k',
                    'debet'         => 0,
                    'kredit'        => $total_jurnal,
                    'reff'          => $id_penjualan,
                    'transaksi'     => 'Penjualan',
                    'id_transaksi'  => $id_transaksi['id_transaksi'],
                ],
            ];

            $this->jurnalModel->createOrderJurnal($jurnal1);
        }

        //insert jurnal kas dan penjualan

        $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
        $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();
        //insert jurnal hpp dan persediaan barang dagang
        $jurnal2 = [
            [
                'id_jurnal'     => $id_jurnalD,
                'tanggal'       => $newDate,
                'id_akun'       => 511,
                'nominal'       => $total_penjualan_diskon,
                'posisi'        => 'd',
                'debet'         => $total_penjualan_diskon,
                'kredit'        => 0,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan',
                'id_transaksi'  => $id_transaksi['id_transaksi'],
            ],
            [
                'id_jurnal'     => $id_jurnalK,
                'tanggal'       => $newDate,
                'id_akun'       => 113,
                'nominal'       => $total_penjualan_diskon,
                'posisi'        => 'k',
                'debet'         => 0,
                'kredit'        => $total_penjualan_diskon,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan',
                'id_transaksi'  => $id_transaksi['id_transaksi'],
            ],
        ];

        $this->jurnalModel->createOrderJurnal($jurnal2);

        unset($_SESSION['id_penjualan']);
        unset($_SESSION['tanggal']);
        session()->setFlashdata('success', 'Data Penjualan Berhasil Disimpan');
        return redirect()->to('/penjualan');
    }

    public function detail($id_penjualan)
    {
        $data = [
            'title'                 => 'Data Detail Penjualan',
            'detail_penjualan'      => $this->penjualanModel->getDetailPenjualan($id_penjualan),
            'penjualan'             => $this->penjualanModel->getById($id_penjualan)
        ];
        // dd($data);
        return view('penjualan/view_data_detail_penjualan', $data);
    }

    public function detailOnline($id_penjualan)
    {
        $data = [
            'title'                 => 'Data Detail Penjualan',
            'detail_penjualan'      => $this->penjualanModel->getDetailPenjualan($id_penjualan),
            'penjualan'             => $this->penjualanModel->getById($id_penjualan),
            'order'                 => $this->penjualanModel->getDetailOrderOnline($id_penjualan)
        ];
        // dd($data);
        return view('penjualan/view_data_detail_penjualan_online', $data);
    }

    public function deleteDetail()
    {
        $id_barang                      = $this->request->getPost('id_barang');
        $jumlah_jual                    = $this->request->getPost('jumlah_jual');
        $id_detail_penjualan            = $this->request->getPost('id_detail_penjualan');

        $this->penjualanModel->deleteDetailPenjualan($id_detail_penjualan);
        session()->setFlashdata('success', 'Data Keranjang Berhasil Dihapus');

        return redirect()->to('/penjualan/addDetail');
    }

    public function addChart()
    {
        $id_penjualan       = $this->penjualanModel->code_penjualan_ID();
        $newDate            = date("Y-m-d");
        $id_barang               = $this->request->getPost('id_barang');
        $jumlah_jual            = $this->request->getPost('jumlah_jual');
        $harga_satuan           = $this->request->getPost('harga_satuan');

        $jumlah_data = $this->penjualanModel->getCountData($id_penjualan);

        // dd($jumlah_data);

        if ($jumlah_data == 0) {

            $data_penjualan = array(
                'id_penjualan'                  => $id_penjualan,
                'tanggal_penjualan'             => $newDate,
            );

            $this->penjualanModel->createPenjualan($data_penjualan);

            $data_detail_penjualan = array(
                'id_penjualan'          => $id_penjualan,
                'id_barang'             => $id_barang,
                'harga_satuan'          => $harga_satuan,
                'jumlah_jual'           => $jumlah_jual,
            );

            $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
        } else {
            $data_detail_penjualan = array(
                'id_penjualan'          => $id_penjualan,
                'id_barang'             => $id_barang,
                'harga_satuan'          => $harga_satuan,
                'jumlah_jual'           => $jumlah_jual,
            );

            $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
        }

        session()->setFlashdata('success', 'Data barang Berhasil Ditambahkan ke Chart');
        return redirect()->to('/home/detail/' . $id_barang);
    }

    public function konfirmasi()
    {
        $id_penjualan = $this->request->getPost('id_penjualan');
        $data_status = array(
            'status'                => 'Pesanan Diproses',
        );
        $this->penjualanModel->updatePenjualan($data_status, $id_penjualan);

        session()->setFlashdata('success', 'Pesanan berhasil diproses');
        return redirect()->to('/penjualan/detailOnline/' . $id_penjualan);
    }

    public function resi()
    {
        $id_penjualan = $this->request->getPost('id_penjualan');
        $data_status = array(
            'status'                => 'Pesanan telah dikirim',
            'no_resi'               => $this->request->getPost('no_resi'),
        );
        $this->penjualanModel->updatePenjualan($data_status, $id_penjualan);

        session()->setFlashdata('success', 'No Resi berhasil disimpan');
        return redirect()->to('/penjualan/detailOnline/' . $id_penjualan);
    }
}
