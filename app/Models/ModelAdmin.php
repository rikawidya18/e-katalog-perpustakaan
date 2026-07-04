<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function TotalBuku()
    {
        return $this->db->table('tbl_buku')->countAll();
    }

    public function TotalEbook()
    {
        return $this->db->table('tbl_ebook')->countAll();
    }

    public function TotalPengunjung()
    {
        return $this->db->table('tbl_pengunjung')->countAll(); //countall digunakan untuk menghitung total, rumus dari dokumentasi codeigniter
    }

    public function GrafikPengunjungFilter($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table('tbl_pengunjung');

        $builder->select("
        DATE(tgl_input) as tanggal,
        COUNT(*) as jumlah
    ");

        if ($tgl_awal && $tgl_akhir) {
            $builder->where('DATE(tgl_input) >=', $tgl_awal);
            $builder->where('DATE(tgl_input) <=', $tgl_akhir);
        }

        $builder->groupBy('DATE(tgl_input)');
        $builder->orderBy('DATE(tgl_input)', 'ASC');

        return $builder->get()->getResultArray();
    }
}