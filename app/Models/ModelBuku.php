<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_buku.id_pengarang', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_buku.id_user', 'left')
            ->select('
                tbl_buku.*,
                tbl_user.nama_user,
                tbl_user.level,
                tbl_pengarang.nama_pengarang,
                tbl_penerbit.nama_penerbit,
                tbl_kategori.nama_kategori,
                tbl_rak.nama_rak
            ')
            ->orderBy('id_buku', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function DetailData($id_buku)
    {
        return $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_buku.id_pengarang', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->where('id_buku', $id_buku)
            ->get()->getRowArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_buku')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_buku')
            ->where('id_buku', $data['id_buku'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_buku')
            ->where('id_buku', $data['id_buku'])
            ->update($data);
    }

    public function CariBuku($keyword, $kategori, $pengarang, $penerbit, $tahun, $tempat)
    {
        $builder = $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_buku.id_pengarang', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left');

        // Pencarian umum
        if ($keyword) {

            $kata = explode(' ', $keyword);

            $builder->groupStart();

            foreach ($kata as $k) {
                $builder->orLike('tbl_buku.judul_buku', $k);
                $builder->orLike('tbl_pengarang.nama_pengarang', $k);
            }

            $builder->groupEnd();
        }

        // Filter kategori
        if ($kategori) {
            $builder->where('tbl_buku.id_kategori', $kategori);
        }

        // Filter pengarang
        if ($pengarang) {
            $builder->like('tbl_pengarang.nama_pengarang', $pengarang);
        }

        // Filter penerbit
        if ($penerbit) {
            $builder->like('tbl_penerbit.nama_penerbit', $penerbit);
        }

        // Filter tahun
        if ($tahun) {
            $builder->where('tbl_buku.tahun_terbit', $tahun);
        }

        // Filter tempat terbit
        if ($tempat) {
            $builder->like('tbl_buku.tempat_terbit', $tempat);
        }

        return $builder->get()->getResultArray();
    }

    public function BukuSlider()
    {
        return $this->db->table('tbl_buku')
            ->orderBy('id_buku', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }

    public function FilterTanggal($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_buku.id_pengarang', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_buku.id_user', 'left')
            ->select('
            tbl_buku.*,
            tbl_user.nama_user,
            tbl_user.level,
            tbl_pengarang.nama_pengarang,
            tbl_penerbit.nama_penerbit,
            tbl_kategori.nama_kategori,
            tbl_rak.nama_rak
        ')
            ->where('tgl_input >=', $tgl_awal)
            ->where('tgl_input <=', $tgl_akhir)
            ->orderBy('tgl_input', 'DESC')
            ->get()
            ->getResultArray();
    }
}