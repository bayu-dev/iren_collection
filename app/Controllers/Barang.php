<?php

namespace App\Controllers;

use \App\Models\BarangModel;
use \App\Models\KategoriModel;

class Barang extends BaseController
{
    protected $validation;
    protected $barangModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Barang',
            'class'                 => 'active',
            'barang'                => $this->barangModel->getBarang(),
        ];
        return view('barang/view_data_barang', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Barang',
            'id_barang'           => $this->barangModel->code_barang_ID(),
            'kategori'           => $this->kategoriModel->findAll(),
        ];
        return view('barang/add_data_barang', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Barang',
            'id_barang'           => $this->barangModel->code_barang_ID(),
            'kategori'           => $this->kategoriModel->findAll(),
        ];
        $this->validation->setRules($this->barangModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $fileProduct = $this->request->getFile('product_image');
            if ($fileProduct->getError() == 4) {
                $ProductName = 'default.png';
            } else {
                $fileProduct->move('assets/images/product');
                $ProductName = $fileProduct->getName();
            }

            $data = array(
                'id_barang' => $this->barangModel->code_barang_ID(),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'kategori_barang' => $this->request->getPost('kategori_barang'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'product_image' => $ProductName,
            );
            $this->barangModel->createBarang($data);
            session()->setFlashdata('success', 'Data Barang Berhasil Ditambahkan');
            return redirect()->to('/barang');
        } else {
            $data['validation'] = $this->validation;
            return view('barang/add_data_barang', $data);
        }
    }

    public function edit($id_barang)
    {
        $data = [
            'title'                 => 'Edit Data Barang',
            'barang'              => $this->barangModel->where('id_barang', $id_barang)->first(),
            'kategori'           => $this->kategoriModel->findAll(),

        ];
        $this->validation->setRules(['nama_barang' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_barang' => $this->request->getPost('nama_barang'),
                'kategori_barang' => $this->request->getPost('kategori_barang'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            );
            $this->barangModel->updateBarang($data, $id_barang);
            session()->setFlashdata('success', 'Data Barang Berhasil Diubah');

            return redirect()->to('/barang');
        }

        return view('barang/edit_data_barang', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_barang');
        $this->barangModel->deleteBarang($id);
        session()->setFlashdata('success', 'Data Barang Berhasil Dihapus');

        return redirect()->to('/barang');
    }
}
