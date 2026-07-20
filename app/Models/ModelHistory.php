<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHistory extends Model
{
    public function AddData($data)
    {
        $this->db->table('tbl_melihat')->insert($data);
    }

    public function AllData()
    {
        return $this->db->table('tbl_melihat')

            ->join(
                'tbl_pengunjung',
                'tbl_pengunjung.id_pengunjung=tbl_melihat.id_pengunjung',
                'left'
            )

            ->join(
                'tbl_buku',
                'tbl_buku.id_buku=tbl_melihat.id_buku',
                'left'
            )

            ->join(
                'tbl_ebook',
                'tbl_ebook.id_ebook=tbl_melihat.id_ebook',
                'left'
            )

            ->select('
            tbl_melihat.*,
            tbl_pengunjung.nama_pengunjung,
            tbl_buku.judul_buku,
            tbl_ebook.judul_ebook
        ')

            ->orderBy('id_history', 'DESC')

            ->get()

            ->getResultArray();
    }

    public function TotalHistory()
    {
        return $this->db->table('tbl_melihat')->countAllResults();
    }

    public function GrafikHistory($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table('tbl_melihat');

        if ($tgl_awal != '' && $tgl_akhir != '') {
            $builder->where('DATE(tgl_history)>=', $tgl_awal);
            $builder->where('DATE(tgl_history)<=', $tgl_akhir);
        }

        return $builder
            ->select("DATE(tgl_history) as tanggal, COUNT(*) as total")
            ->groupBy("DATE(tgl_history)")
            ->orderBy("DATE(tgl_history)")
            ->get()
            ->getResultArray();
    }
}