<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengarang;
use CodeIgniter\HTTP\ResponseInterface;

class Pengarang extends BaseController
{

    protected $ModelPengarang;

    public function __construct()
    {
        helper('form');
        $this->ModelPengarang = new ModelPengarang;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'pengarang',
            'judul' => 'Pengarang',
            'page' => 'v_pengarang',
            'pengarang' => $this->ModelPengarang->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        if ($this->validate([
            'nama_pengarang' => [
                'label' => 'Nama Pengarang',
                'rules' => 'required|is_unique[tbl_pengarang.nama_pengarang]',
                'errors' => [
                    'required'  => '{field} Wajib Diisi!',
                    'is_unique' => '{field} Sudah Terdaftar!',
                ]
            ]
        ])) {

            // jika lolos validasi
            $data = [
                'nama_pengarang' => $this->request->getPost('nama_pengarang'),
            ];

            $this->ModelPengarang->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('Pengarang'));
        } else {

            // jika gagal validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Pengarang'));
        }
    }

    public function EditData($id_pengarang)
    {
        $data = [
            'id_pengarang' => $id_pengarang,
            'nama_pengarang' => $this->request->getPost('nama_pengarang')
        ];
        $this->ModelPengarang->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('pengarang'));
    }

    public function DeleteData($id_pengarang)
    {
        $data = ['id_pengarang' => $id_pengarang];
        $this->ModelPengarang->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('pengarang'));
    }
}