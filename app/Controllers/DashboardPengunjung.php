<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPengunjung;
use App\Models\ModelKelas;
use App\Models\ModelEbook;

class DashboardPengunjung extends BaseController
{

    protected $ModelPengunjung;
    protected $ModelKelas;
    protected $ModelEbook;

    public function __construct()
    {
        helper('form');
        $this->ModelPengunjung = new ModelPengunjung();
        $this->ModelKelas = new ModelKelas();
        $this->ModelEbook = new ModelEbook();
    }

    public function index()
    {
        $id_pengunjung = session()->get('id_pengunjung');
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Profile Pengunjung',
            'page' => 'v_dashboard_pengunjung',
            'pengunjung' => $this->ModelPengunjung->ProfilePengunjung($id_pengunjung),
            'kelas' => $this->ModelKelas->AllData(),
            'ebook'=> $this->ModelEbook->AllData(), 
        ];
        return view('v_template_pengunjung', $data);
    }

    public function EditProfile()
    {
        $id_pengunjung = session()->get('id_pengunjung');
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Edit Profile Pengunjung',
            'page' => 'v_edit_profile_pengunjung',
            'pengunjung' => $this->ModelPengunjung->ProfilePengunjung($id_pengunjung),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_pengunjung', $data);
    }

    public function GaleriEbook()
    {
        // ambil data pengunjung dari session
        $id_pengunjung = session()->get('id_pengunjung');

        $db = \Config\Database::connect();

        $pengunjung = $db->table('tbl_pengunjung')
            ->where('id_pengunjung', $id_pengunjung)
            ->get()
            ->getRowArray();

        // cek verifikasi
        if ($pengunjung['verifikasi'] != 1) {

            session()->setFlashdata(
                'pesan',
                'Akun Anda belum terverifikasi!'
            );

            return redirect()->to(base_url('DashboardPengunjung'));
        }

        // jika sudah verifikasi
        $data = [
            'judul' => 'Galeri Ebook',
            'page' => 'pengunjung/v_galeri_ebook',
            'ebook' => $this->ModelEbook->AllData(),
        ];

        return view('v_template_pengunjung', $data);
    }
}