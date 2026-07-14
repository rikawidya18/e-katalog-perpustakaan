<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{

    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
    public function AllData()
    {
        return $this->db->table('tbl_kategori')
            ->orderBy('nama_kategori', 'ASC')
            ->get()->getResultArray();
    }

    public function Add($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function GetByNama($nama)
    {
        return $this->where('nama_kategori', $nama)->first();
    }

    public function InsertGetId($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
        return $this->db->insertID();
    }

}