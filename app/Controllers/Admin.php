<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelEbook;

class Admin extends BaseController
{

    protected $ModelAdmin;
    protected $ModelEbook;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin;
        $this->ModelEbook = new ModelEbook;
    }

    public function index(): string
    {
        $db = \Config\Database::connect();

        // FILTER DOWNLOAD
        $tgl_awal_download = $this->request->getGet('tgl_awal_download');
        $tgl_akhir_download = $this->request->getGet('tgl_akhir_download');

        // FILTER PENGUNJUNG
        $tgl_awal_pengunjung = $this->request->getGet('tgl_awal_pengunjung');
        $tgl_akhir_pengunjung = $this->request->getGet('tgl_akhir_pengunjung');

        // =============================
        // GRAFIK DOWNLOAD
        // =============================
        $grafikDownload = $this->ModelEbook->GrafikDownloadKategori($tgl_awal_download, $tgl_akhir_download);

        $label_download = [];
        $data_download = [];

        foreach ($grafikDownload as $row) {
            $label_download[] = $row['nama_kategori'];
            $data_download[] = (int) $row['total_download'];
        }

        // =============================
        // GRAFIK BUKU & EBOOK
        // =============================
        $query = $db->query("
        SELECT k.nama_kategori,
            COUNT(DISTINCT b.id_buku) as jumlah_buku,
            COUNT(DISTINCT e.id_ebook) as jumlah_ebook
        FROM tbl_kategori k
        LEFT JOIN tbl_buku b ON b.id_kategori = k.id_kategori
        LEFT JOIN tbl_ebook e ON e.id_kategori = k.id_kategori
        GROUP BY k.id_kategori
    ");

        $result = $query->getResultArray();

        $labels = [];
        $data_buku = [];
        $data_ebook = [];

        foreach ($result as $row) {
            $labels[] = $row['nama_kategori'];
            $data_buku[] = (int) $row['jumlah_buku'];
            $data_ebook[] = (int) $row['jumlah_ebook'];
        }

        // =============================
        // GRAFIK PENGUNJUNG (FIX)
        // =============================
        $queryPengunjung = $db->query("
        SELECT DATE(tgl_input) as tanggal, COUNT(*) as jumlah
        FROM tbl_pengunjung
        WHERE tgl_input IS NOT NULL
        " . ($tgl_awal_pengunjung && $tgl_akhir_pengunjung ? "AND DATE(tgl_input) BETWEEN '$tgl_awal_pengunjung' AND '$tgl_akhir_pengunjung'" : "") . "
        GROUP BY DATE(tgl_input)
    ");

        $resultPengunjung = $queryPengunjung->getResultArray();

        $label_pengunjung = [];
        $data_pengunjung = [];

        foreach ($resultPengunjung as $row) {
            $label_pengunjung[] = $row['tanggal'];
            $data_pengunjung[] = (int) $row['jumlah'];
        }

        // =============================
        // KIRIM KE VIEW
        // =============================
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Dashboard',
            'page' => 'v_dashboard_admin',

            'totalbuku' => $this->ModelAdmin->TotalBuku(),
            'totalebook' => $this->ModelAdmin->TotalEbook(),
            'totalpengunjung' => $this->ModelAdmin->TotalPengunjung(),

            'label_download' => json_encode($label_download),
            'data_download' => json_encode($data_download),

            'labels' => json_encode($labels),
            'data_buku' => json_encode($data_buku),
            'data_ebook' => json_encode($data_ebook),

            'label_pengunjung' => json_encode($label_pengunjung),
            'data_pengunjung' => json_encode($data_pengunjung),
        ];

        return view('v_template_admin', $data);
    }
}