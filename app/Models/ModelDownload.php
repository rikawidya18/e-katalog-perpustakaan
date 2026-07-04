<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDownload extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_download')
            ->join('tbl_ebook', 'tbl_ebook.id_ebook = tbl_download.id_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori') // FIX
            // ->join('tbl_pengunjung', 'tbl_pengunjung.id_pengunjung = tbl_download.id_pengunjung', 'left')
            ->select('tbl_download.*, tbl_ebook.judul_ebook, tbl_kategori.nama_kategori')
            ->orderBy('id_download', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_download')->insert($data);
    }

}