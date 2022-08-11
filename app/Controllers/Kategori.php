<?php

namespace App\Controllers;

use \App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $validation;
    protected $kategoriModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Kategori',
            'kategori'             => $this->kategoriModel->getKategori(),
            'id_kategori'             => $this->kategoriModel->code_kategori_ID(),
        ];
        return view('kategori/view_data_kategori', $data);
    }

    public function add()
    {
        $data = array(
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        $this->kategoriModel->createKategori($data);
        session()->setFlashdata('success', 'Data Kategori Berhasil Ditambahkan');

        return redirect()->to('/kategori');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_kategori');
        $data = array(
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        $this->kategoriModel->updateKategori($data, $id);
        session()->setFlashdata('success', 'Data Kategori Berhasil Diubah');

        return redirect()->to('/kategori');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kategori');
        $this->kategoriModel->deleteKategori($id);
        session()->setFlashdata('success', 'Data Kategori Berhasil Dihapus');

        return redirect()->to('/kategori');
    }
}
