<?php

namespace App\Controllers;

use \App\Models\CoaModel;

class Coa extends BaseController
{
    protected $coaModel;

    public function __construct()
    {
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data COA',
            'class'     => 'active',
            'coa'       => $this->coaModel->getCoa(),
        ];
        return view('coa/view_data_coa', $data);
    }

    public function add()
    {
        $id_akun = $this->coaModel->where('id_akun', $this->request->getPost('id_akun'))->get()->getFirstRow();
        if ($id_akun) {
            session()->setFlashdata('error', 'Nomor Akun sudah tersedia');

            return redirect()->to('/coa');
            $nama_akun = $this->coaModel->where('nama_akun', $this->request->getPost('nama_akun'))->get()->getFirstRow();
            if ($nama_akun) {
                session()->setFlashdata('error', 'Nama Akun sudah tersedia');

                return redirect()->to('/coa');
            } else {
                $data = array(
                    'id_akun'           => $this->request->getPost('id_akun'),
                    'nama_akun'         => $this->request->getPost('nama_akun'),
                    'saldo_normal'      => $this->request->getPost('saldo_normal'),
                    'sa' => $this->request->getPost('sa'),
                );
                $this->coaModel->createCoa($data);
                session()->setFlashdata('success', 'Data COA Berhasil Ditambahkan');

                return redirect()->to('/coa');
            }
        } else {
            $nama_akun = $this->coaModel->where('nama_akun', $this->request->getPost('nama_akun'))->get()->getFirstRow();
            if ($nama_akun) {
                session()->setFlashdata('error', 'Nama Akun sudah tersedia');

                return redirect()->to('/coa');
            } else {
                $data = array(
                    'id_akun'           => $this->request->getPost('id_akun'),
                    'nama_akun'         => $this->request->getPost('nama_akun'),
                    'saldo_normal'      => $this->request->getPost('saldo_normal'),
                    'sa' => $this->request->getPost('sa'),
                );
                $this->coaModel->createCoa($data);
                session()->setFlashdata('success', 'Data COA Berhasil Ditambahkan');

                return redirect()->to('/coa');
            }
        }
    }

    public function edit()
    {
        $id = $this->request->getPost('id_akun');
        $data = array(
            'nama_akun' => $this->request->getPost('nama_akun'),
            'kategori' => $this->request->getPost('kategori'),
            'sa' => $this->request->getPost('sa'),
            'saldo_normal' => $this->request->getPost('saldo_normal'),
        );
        $this->coaModel->updateCoa($data, $id);
        session()->setFlashdata('success', 'Data COA Berhasil Diubah');

        return redirect()->to('/coa');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_akun');
        $this->coaModel->deleteCoa($id);
        session()->setFlashdata('success', 'Data COA Berhasil Dihapus');

        return redirect()->to('/coa');
    }
}
