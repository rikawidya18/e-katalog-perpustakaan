<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengunjung extends Model
{

    public function ProfilePengunjung($id_pengunjung)
    {
        return $this->db->table('tbl_pengunjung')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengunjung.id_kelas', 'left')
            ->where('tbl_pengunjung.id_pengunjung', $id_pengunjung)
            ->get()
            ->getRowArray();
    }

    public function AllData()
    {
        return $this->db->table('tbl_pengunjung')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengunjung.id_kelas', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengunjung.verifikasi', 'left')
            ->select('
            tbl_pengunjung.*, 
            tbl_kelas.nama_kelas,
            tbl_user.nama_user,
            ')
            ->orderBy('id_pengunjung', 'DESC')
            ->get()->getResultArray();
    }

    public function EditData($data)
    {
        $this->db->table('tbl_pengunjung')
            ->where('id_pengunjung', $data['id_pengunjung'])
            ->update($data);
    }

    public function AddData($data)
    {
        $this->db->table('tbl_pengunjung')->insert($data);
    }

    public function DetailData($id_pengunjung)
    {
        return $this->db->table('tbl_pengunjung')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengunjung.id_kelas', 'left')
            ->where('id_pengunjung', $id_pengunjung)
            ->get()->getRowArray();
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_pengunjung')
            ->where('id_pengunjung', $data['id_pengunjung'])
            ->delete($data);
    }

    public function FilterTanggal($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('tbl_pengunjung')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengunjung.id_kelas', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengunjung.verifikasi', 'left')
            ->select('
            tbl_pengunjung.*, 
            tbl_kelas.nama_kelas,
            tbl_user.nama_user
        ')
            ->where('DATE(tbl_pengunjung.tgl_input) >=', $tgl_awal)
            ->where('DATE(tbl_pengunjung.tgl_input) <=', $tgl_akhir)
            ->orderBy('id_pengunjung', 'DESC')
            ->get()
            ->getResultArray();
    }

}