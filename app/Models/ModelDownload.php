<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDownload extends Model
{
    protected $table = 'tbl_download';
    protected $primaryKey = 'id_download';

    protected $allowedFields = [
        'id_ebook',
        'id_pengunjung',
        'tgl_download'
    ];

    public function AllData()
    {
        return $this->db->table('tbl_download')
            ->join('tbl_ebook', 'tbl_ebook.id_ebook = tbl_download.id_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori')
            ->join('tbl_pengunjung', 'tbl_pengunjung.id_pengunjung = tbl_download.id_pengunjung', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengunjung.id_kelas', 'left')
            ->select('
            tbl_download.*,
            tbl_ebook.judul_ebook,
            tbl_kategori.nama_kategori,
            tbl_kelas.nama_kelas
        ')
            ->orderBy('tbl_download.id_download', 'DESC')
            ->get()
            ->getResultArray();
    }
}