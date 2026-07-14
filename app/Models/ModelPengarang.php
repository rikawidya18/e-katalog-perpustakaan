<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengarang extends Model
{

    protected $table = 'tbl_pengarang';
    protected $primaryKey = 'id_pengarang';
    protected $allowedFields = ['nama_pengarang'];
    public function AllData()
    {
        return $this->db->table('tbl_pengarang')
            ->orderBy('nama_pengarang', 'ASC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_pengarang')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_pengarang')
            ->where('id_pengarang', $data['id_pengarang'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_pengarang')
            ->where('id_pengarang', $data['id_pengarang'])
            ->update($data);
    }

    public function GetByNama($nama)
    {
        return $this->where('nama_pengarang', $nama)->first();
    }

    public function InsertGetId($data)
    {
        $this->db->table('tbl_pengarang')->insert($data);
        return $this->db->insertID();
    }
}