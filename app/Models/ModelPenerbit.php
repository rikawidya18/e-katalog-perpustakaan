<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{

    protected $table = 'tbl_penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $allowedFields = ['nama_penerbit'];
    public function AllData()
    {
        return $this->db->table('tbl_penerbit')
            ->orderBy('nama_penerbit', 'ASC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_penerbit')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_penerbit')
            ->where('id_penerbit', $data['id_penerbit'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_penerbit')
            ->where('id_penerbit', $data['id_penerbit'])
            ->update($data);
    }

    public function GetByNama($nama)
    {
        return $this->where('nama_penerbit', $nama)->first();
    }

    public function InsertGetId($data)
    {
        $this->db->table('tbl_penerbit')->insert($data);
        return $this->db->insertID();
    }
}