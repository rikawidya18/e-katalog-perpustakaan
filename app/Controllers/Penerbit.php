<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenerbit;
use CodeIgniter\HTTP\ResponseInterface;

class Penerbit extends BaseController
{

    protected $ModelPenerbit;

    public function __construct()
    {
        helper('form');
        $this->ModelPenerbit = new ModelPenerbit;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'penerbit',
            'judul' => 'Penerbit',
            'page' => 'v_penerbit',
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        if (
            $this->validate([
                'nama_penerbit' => [
                    'label' => 'Nama Penerbit',
                    'rules' => 'required|is_unique[tbl_penerbit.nama_penerbit]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                        'is_unique' => '{field} Sudah Terdaftar!',
                    ]
                ]
            ])
        ) {

            // jika lolos validasi
            $data = [
                'nama_penerbit' => $this->request->getPost('nama_penerbit'),
            ];

            $this->ModelPenerbit->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('Penerbit'));
        } else {

            // jika gagal validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Penerbit'));
        }
    }

    public function EditData($id_penerbit)
    {
        $data = [
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $this->request->getPost('nama_penerbit')
        ];
        $this->ModelPenerbit->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('Penerbit'));
    }

    public function DeleteData($id_penerbit)
    {
        $data = ['id_penerbit' => $id_penerbit];
        $this->ModelPenerbit->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('Penerbit'));
    }

    public function GetByNama($nama)
    {
        return $this->db->table('tbl_penerbit')
            ->where('nama_penerbit', $nama)
            ->get()
            ->getRowArray();
    }

    public function InsertGetId($data)
    {
        $this->db->table('tbl_penerbit')->insert($data);
        return $this->db->insertID();
    }
}