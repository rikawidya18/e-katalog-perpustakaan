<?php

namespace App\Controllers;

use App\Models\ModelPengaturan;
use App\Models\ModelBuku;
use App\Models\ModelEbook;
use App\Models\ModelKategori;
use App\Models\ModelHistory;

class Home extends BaseController
{

    protected $ModelPengaturan;
    protected $ModelBuku;
    protected $ModelEbook;
    protected $ModelKategori;
    protected $ModelHistory;

    public function __construct()
    {
        helper('form');

        $this->ModelPengaturan = new ModelPengaturan();
        $this->ModelBuku = new ModelBuku();
        $this->ModelEbook = new ModelEbook();
        $this->ModelKategori = new ModelKategori();
        $this->ModelHistory = new ModelHistory();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'kategori' => $this->ModelKategori->AllData(),
            'buku' => $this->ModelBuku->BukuSlider(),

        ];

        return view('v_template', $data);
    }

    public function Sejarah()
    {
        $data = [
            'judul' => 'Sejarah',
            'page' => 'v_sejarah',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];

        return view('v_template', $data);
    }

    public function VisiMisi()
    {
        $data = [
            'judul' => 'Visi & Misi',
            'page' => 'v_visi_misi',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];

        return view('v_template', $data);
    }

    public function GaleriBuku()
    {
        $data = [
            'judul' => 'Galeri Buku',
            'page' => 'v_galeri_buku',
            'buku' => $this->ModelBuku->AllData(),
        ];

        return view('v_template', $data);
    }

    public function GaleriEbook()
    {
        $data = [
            'judul' => 'Galeri Ebook',
            'page' => 'v_galeri_ebook',
            'ebook' => $this->ModelEbook->AllData(),
        ];

        return view('v_template', $data);
    }

    public function DetailBuku($id_buku)
    {
        if (session()->get('id_pengunjung')) {

            $this->ModelHistory->AddData([
                'id_pengunjung' => session()->get('id_pengunjung'),
                'aktivitas' => 'Melihat Buku',
                'id_buku' => $id_buku,
                'tgl_history' => date('Y-m-d H:i:s')
            ]);
        }

        $data = [
            'judul' => 'Detail Buku',
            'page' => 'v_detail_buku',
            'buku' => $this->ModelBuku->DetailData($id_buku),
        ];

        return view('v_template', $data);
    }

    public function DetailEbook($id_ebook)
    {
        if (session()->get('id_pengunjung')) {

            $this->ModelHistory->AddData([
                'id_pengunjung' => session()->get('id_pengunjung'),
                'aktivitas' => 'Melihat Ebook',
                'id_ebook' => $id_ebook,
                'tgl_history' => date('Y-m-d H:i:s')
            ]);
        }

        $data = [
            'judul' => 'Detail Ebook',
            'page' => 'v_detail_ebook',
            'ebook' => $this->ModelEbook->DetailData($id_ebook),
        ];

        return view('v_template', $data);
    }

    public function HasilCari()
    {

        $keyword = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('id_kategori');
        $pengarang = $this->request->getGet('pengarang');
        $penerbit = $this->request->getGet('penerbit');
        $tahun = $this->request->getGet('tahun_terbit');
        $tempat = $this->request->getGet('tempat_terbit');

        $buku = $this->ModelBuku->CariBuku($keyword, $kategori, $pengarang, $penerbit, $tahun, $tempat);
        $ebook = $this->ModelEbook->CariEbook($keyword, $kategori, $pengarang, $penerbit, $tahun, $tempat);

        if (session()->get('id_pengunjung')) {

            $this->ModelHistory->AddData([
                'id_pengunjung' => session()->get('id_pengunjung'),
                'aktivitas' => 'Pencarian',
                'keyword' => $keyword,
                'tgl_history' => date('Y-m-d H:i:s')
            ]);
        }

        $data = [
            'judul' => 'Hasil Pencarian',
            'page' => 'v_hasil_cari',
            'buku' => $buku,
            'ebook' => $ebook,
        ];

        return view('v_template', $data);
    }

    public function About()
    {
        $db = \Config\Database::connect();

        $web = $db->table('tbl_web')
            ->where('id_web', 1)
            ->get()
            ->getRowArray();

        $data = [
            'judul' => 'About Me',
            'page' => 'v_about',
            'web' => $web
        ];

        return view('v_template', $data);
    }
}