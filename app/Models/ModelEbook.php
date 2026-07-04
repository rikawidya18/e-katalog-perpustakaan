<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEbook extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_ebook.id_pengarang', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_ebook.id_user', 'left')
            ->select('
                tbl_ebook.*,
                tbl_user.nama_user,
                tbl_user.level,
                tbl_pengarang.nama_pengarang,
                tbl_penerbit.nama_penerbit,
                tbl_kategori.nama_kategori
            ')
            ->orderBy('judul_ebook', 'ASC')
            ->get()->getResultArray();
    }

    public function DetailData($id_ebook)
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_ebook.id_pengarang', 'left')
            ->where('id_ebook', $id_ebook)
            ->get()->getRowArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_ebook')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ebook')
            ->where('id_ebook', $data['id_ebook'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_ebook')
            ->where('id_ebook', $data['id_ebook'])
            ->update($data);
    }

    public function CariEbook($keyword, $kategori, $pengarang, $penerbit, $tahun, $tempat)
    {
        $builder = $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_ebook.id_pengarang', 'left');

        // pencarian umum
        if ($keyword) {

            $kata = explode(' ', $keyword);

            $builder->groupStart();

            foreach ($kata as $k) {
                $builder->orLike('tbl_ebook.judul_ebook', $k);
                $builder->orLike('tbl_pengarang.nama_pengarang', $k);
            }

            $builder->groupEnd();
        }

        // kategori
        if ($kategori) {
            $builder->where('tbl_ebook.id_kategori', $kategori);
        }

        // pengarang
        if ($pengarang) {
            $builder->like('tbl_pengarang.nama_pengarang', $pengarang);
        }

        // penerbit
        if ($penerbit) {
            $builder->like('tbl_penerbit.nama_penerbit', $penerbit);
        }

        // tahun
        if ($tahun) {
            $builder->where('tbl_ebook.tahun_terbit', $tahun);
        }

        // tempat terbit
        if ($tempat) {
            $builder->like('tbl_ebook.tempat_terbit', $tempat);
        }

        return $builder->get()->getResultArray();
    }

    public function GrafikDownloadKategori($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table('tbl_download');

        $builder->select('tbl_kategori.nama_kategori, COUNT(tbl_download.id_download) as total_download');

        $builder->join('tbl_ebook', 'tbl_ebook.id_ebook = tbl_download.id_ebook');
        $builder->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori');

        // =============================
        // FILTER TANGGAL (BENAR)
        // =============================
        if (!empty($tgl_awal) && !empty($tgl_akhir)) {
            $builder->where('DATE(tbl_download.tgl_download) >=', $tgl_awal);
            $builder->where('DATE(tbl_download.tgl_download) <=', $tgl_akhir);
        }

        $builder->groupBy('tbl_kategori.id_kategori');

        return $builder->get()->getResultArray();
    }

    public function TambahDownload($id_ebook)
    {
        $this->db->table('tbl_ebook')
            ->set('download', 'download+1', false)
            ->where('id_ebook', $id_ebook)
            ->update();
    }

        public function FilterTanggal($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_ebook.id_pengarang', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_ebook.id_user', 'left')
            ->select('
            tbl_ebook.*,
            tbl_user.nama_user,
            tbl_user.level,
            tbl_pengarang.nama_pengarang,
            tbl_penerbit.nama_penerbit,
            tbl_kategori.nama_kategori,
        ')
            ->where('tgl_input >=', $tgl_awal)
            ->where('tgl_input <=', $tgl_akhir)
            ->orderBy('tgl_input', 'DESC')
            ->get()
            ->getResultArray();
    }

}