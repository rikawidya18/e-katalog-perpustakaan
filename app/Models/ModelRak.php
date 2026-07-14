<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{

    protected $table = 'tbl_rak';
    protected $primaryKey = 'id_rak';
    protected $allowedFields = ['nama_rak'];
    public function AllData()
    {
        return $this->db->table('tbl_rak')
            ->orderBy('nama_rak', 'ASC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_rak')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak', $data['id_rak'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak', $data['id_rak'])
            ->update($data);
    }

    public function GetByNama($nama)
    {
        return $this->where('nama_rak', $nama)->first();
    }

    public function InsertGetId($data)
    {
        $this->db->table('tbl_rak')->insert($data);
        return $this->db->insertID();
    }
}