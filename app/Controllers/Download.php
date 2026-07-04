<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDownload;
use App\Models\ModelEbook;
use App\Models\ModelPengunjung;

class Download extends BaseController
{
    protected $ModelDownload;
    protected $ModelEbook;
    protected$ModelPengunjung; 

    public function __construct()
    {
        helper('form');
        $this->ModelDownload = new ModelDownload();
        $this->ModelEbook = new ModelEbook();
        $this->ModelPengunjung = new ModelPengunjung();
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'download',
            'judul' => 'Download',
            'page' => 'v_download',

            'download' => $this->ModelDownload->AllData(),
            'ebook' => $this->ModelEbook->AllData(),
        ];

        return view('v_template_admin', $data);
    }


}