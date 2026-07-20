<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelHistory;

class History extends BaseController
{
    protected $ModelHistory;

    public function __construct()
    {
        $this->ModelHistory = new ModelHistory();
    }

    public function index()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'history',
            'judul' => 'Riwayat Aktivitas Pengunjung',
            'page' => 'v_history',
            'history' => $this->ModelHistory->AllData(),
        ];

        return view('v_template_admin', $data);
    }
}