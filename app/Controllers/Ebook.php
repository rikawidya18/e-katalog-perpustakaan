<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use App\Models\ModelEbook;
use App\Models\ModelKategori;
use App\Models\ModelPenerbit;
use App\Models\ModelPengarang;
use App\Models\ModelDownload;

class Ebook extends BaseController
{
    protected $ModelEbook;
    protected $ModelKategori;
    protected $ModelPenerbit;
    protected $ModelPengarang;
    protected $ModelDownload;
    protected $db;

    public function __construct()
    {
        helper('form');

        $this->ModelEbook = new ModelEbook();
        $this->ModelKategori = new ModelKategori();
        $this->ModelPenerbit = new ModelPenerbit();
        $this->ModelPengarang = new ModelPengarang();
        $this->ModelDownload = new ModelDownload();

        $this->db = Database::connect();
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Ebook',
            'page' => 'ebook/v_index',
            'ebook' => $this->ModelEbook->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Add Ebook',
            'page' => 'ebook/v_adddata',
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'pengarang' => $this->ModelPengarang->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if (
            $this->validate([

                'judul_ebook' => [
                    'label' => 'Judul Ebook',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'isbn' => [
                    'label' => 'ISBN',
                    //data isbn harus unique
                    'rules' => 'required|is_unique[tbl_ebook.isbn]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database  !',
                    ]
                ],

                'id_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'id_penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'id_pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'tempat_terbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'bahasa' => [
                    'label' => 'Bahasa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'cover' => [
                    'label' => 'Cover',
                    'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi !',
                        'max_size' => '{field} Max 2048 kb !',
                        'mime_in' => 'Format {field} Harus JPG, PNG, JPEG !',
                    ]
                ],

                'file_ebook' => [
                    'label' => 'File Ebook',
                    'rules' => 'uploaded[file_ebook]|max_size[file_ebook,5120]|ext_in[file_ebook,pdf]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi !',
                        'max_size' => '{field} Max 5 mb !',
                        'ext_in' => 'Format {field} Harus PDF !',
                    ]
                ],

                'deskripsi' => [
                    'label' => 'Deskripsi / Sinopsis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

            ])
        ) {
            //jika lolos validasi
            $cover = $this->request->getFile('cover');
            $nama_file = $cover->getRandomName();
            $file_ebook = $this->request->getFile('file_ebook');
            $nama_file_ebook = $file_ebook->getRandomName();
            $data = [
                'judul_ebook' => $this->request->getPost('judul_ebook'),
                'isbn' => $this->request->getPost('isbn'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_pengarang' => $this->request->getPost('id_pengarang'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                'tempat_terbit' => $this->request->getPost('tempat_terbit'),
                'bahasa' => $this->request->getPost('bahasa'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'cover' => $nama_file,
                'file_ebook' => $nama_file_ebook,
                'id_user' => session()->get('id_user'),
                'tgl_input' => date('Y-m-d'),
            ];

            //memindahkan/upload file cover ke dalam folder cover
            $cover->move('ebooks', $nama_file);
            $file_ebook->move('ebooksfile', $nama_file_ebook);

            $this->ModelEbook->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan!');
            return redirect()->to(base_url('Ebook/AddData'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ebook/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_ebook)
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Edit Ebook',
            'page' => 'ebook/v_editdata',
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'pengarang' => $this->ModelPengarang->AllData(),
            'ebook' => $this->ModelEbook->DetailData($id_ebook),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_ebook)
    {
        if (
            $this->validate([

                'judul_ebook' => [
                    'label' => 'Judul Ebook',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'isbn' => [
                    'label' => 'ISBN',
                    //data isbn unique kecuali data dari id_ebook itu sendiri
                    'rules' => 'required|is_unique[tbl_ebook.isbn,id_ebook,' . $id_ebook . ']',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database  !',
                    ]
                ],

                'id_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'id_penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'id_pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'tempat_terbit' => [
                    'label' => 'Tempat Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'bahasa' => [
                    'label' => 'Bahasa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'cover' => [
                    'label' => 'Cover',
                    'rules' => 'max_size[cover,2048]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => '{field} Max 2048 kb !',
                        'mime_in' => 'Format {field} Harus JPG, PNG, JPEG !',
                    ]
                ],

                'file_ebook' => [
                    'label' => 'File Ebook',
                    'rules' => 'max_size[file_ebook,5120]|ext_in[file_ebook,pdf]',
                    'errors' => [
                        'max_size' => '{field} Max 5 mb !',
                        'ext_in' => 'Format {field} Harus PDF !',
                    ]
                ],

                'deskripsi' => [
                    'label' => 'Deskripsi / Sinopsis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

            ])
        ) {
            //mengambil data lama dari database
            $ebook = $this->ModelEbook->DetailData($id_ebook);

            // edit cover
            $cover = $this->request->getFile('cover');
            //cek jika file cover diganti
            if ($cover && $cover->isValid()) {
                $namaCover = $cover->getRandomName();
                $cover->move('ebooks', $namaCover);
                //hapus cover lama
                if ($ebook['cover'] && file_exists('ebooks/' . $ebook['cover'])) {
                    unlink('ebooks/' . $ebook['cover']);
                }
            } else {
                //jika file cover tidak diganti
                $namaCover = $ebook['cover'];
            }

            // edit file ebook
            $file = $this->request->getFile('file_ebook');

            if ($file && $file->isValid()) {
                $namaFile = $file->getRandomName();
                $file->move('ebooksfile', $namaFile);
                //hapus file ebook lama
                if ($ebook['file_ebook'] && file_exists('ebooksfile/' . $ebook['file_ebook'])) {
                    unlink('ebooksfile/' . $ebook['file_ebook']);
                }
            } else {
                //jika file ebook tidak diganti
                $namaFile = $ebook['file_ebook'];
            }

            // proses update data dengan data lama dan data baru
            $data = [
                'id_ebook' => $id_ebook,
                'judul_ebook' => $this->request->getPost('judul_ebook'),
                'isbn' => $this->request->getPost('isbn'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_pengarang' => $this->request->getPost('id_pengarang'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                'tempat_terbit' => $this->request->getPost('tempat_terbit'),
                'bahasa' => $this->request->getPost('bahasa'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'cover' => $namaCover,
                'file_ebook' => $namaFile,
            ];

            $this->ModelEbook->EditData($data);

            session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
            return redirect()->to(base_url('Ebook'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ebook/EditData/' . $id_ebook))->withInput();
        }
    }

    public function DeleteData($id_ebook)
    {
        $ebook = $this->ModelEbook->DetailData($id_ebook);
        //hapus cover lama
        if ($ebook['cover'] && file_exists('ebooks/' . $ebook['cover'])) {
            unlink('ebooks/' . $ebook['cover']);
        }
        //hapus file ebook lama
        if ($ebook['file_ebook'] && file_exists('ebooksfile/' . $ebook['file_ebook'])) {
            unlink('ebooksfile/' . $ebook['file_ebook']);
        }

        $data = ['id_ebook' => $id_ebook];
        $this->ModelEbook->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('Ebook'));
    }

    public function download($id_ebook)
    {
        // =============================
        // AMBIL DATA EBOOK
        // =============================
        $ebook = $this->ModelEbook->DetailData($id_ebook);

        if (!$ebook) {
            session()->setFlashdata('pesan', 'Data ebook tidak ditemukan!');
            return redirect()->back();
        }

        // =============================
        // CEK FILE
        // =============================
        $filePath = FCPATH . 'ebooksfile/' . $ebook['file_ebook'];

        if (empty($ebook['file_ebook']) || !file_exists($filePath)) {
            session()->setFlashdata('pesan', 'File tidak ditemukan!');
            return redirect()->back();
        }

        // =============================
        // AMBIL ID PENGUNJUNG (SESSION)
        // =============================
        $id_pengunjung = session()->get('id_pengunjung');

        if (!$id_pengunjung) {
            session()->setFlashdata('pesan', 'Silakan login terlebih dahulu!');
            return redirect()->to(base_url('Auth/LoginPengunjung'));
        }

        // =============================
        // KONEKSI DATABASE
        // =============================
        $db = \Config\Database::connect();

        // =============================
        // CEK STATUS VERIFIKASI
        // =============================
        $pengunjung = $db->table('tbl_pengunjung')
            ->where('id_pengunjung', $id_pengunjung)
            ->get()
            ->getRowArray();

        if ($pengunjung['verifikasi'] != 1) {
            session()->setFlashdata(
                'pesan',
                'Akun Anda belum terverifikasi. Silakan hubungi petugas perpustakaan!'
            );

            return redirect()->back();
        }

        // =============================
        // TRANSAKSI
        // =============================
        $db->transBegin();

        
        // =============================
        // TRANSAKSI
        // =============================
        $db = \Config\Database::connect(); // 🔥 FIX ERROR undefined $this->db
        $db->transBegin();

        // =============================
        // 1. SIMPAN KE TABEL DOWNLOAD
        // =============================
        $dataDownload = [
            'id_ebook' => $id_ebook,
            'id_pengunjung' => $id_pengunjung, // 🔥 TAMBAHAN WAJIB
            'tgl_download' => date('Y-m-d H:i:s')
        ];

        $this->ModelDownload->AddData($dataDownload);

        // =============================
        // 2. UPDATE JUMLAH DOWNLOAD
        // =============================
        $this->ModelEbook->TambahDownload($id_ebook);

        // =============================
        // CEK TRANSAKSI
        // =============================
        if ($db->transStatus() === false) {
            $db->transRollback();
            session()->setFlashdata('pesan', 'Gagal menyimpan data download!');
            return redirect()->back();
        }

        $db->transCommit();

        // =============================
        // DOWNLOAD FILE
        // =============================
        return $this->response
            ->download($filePath, null)
            ->setFileName($ebook['file_ebook']);
    }

    public function Filter()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Filter Ebook',
            'page' => 'ebook/v_index',
            'ebook' => $this->ModelEbook->FilterTanggal($tgl_awal, $tgl_akhir),
        ];

        return view('v_template_admin', $data);
    }
}