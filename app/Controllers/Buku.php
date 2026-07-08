<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelBuku;
use App\Models\ModelKategori;
use App\Models\ModelPenerbit;
use App\Models\ModelPengarang;
use App\Models\ModelRak;

class Buku extends BaseController
{

    protected $ModelBuku;
    protected $ModelKategori;
    protected $ModelPenerbit;
    protected $ModelPengarang;
    protected $ModelRak;

    public function __construct()
    {
        helper('form');
        $this->ModelBuku = new ModelBuku;
        $this->ModelPengarang = new ModelPengarang;
        $this->ModelPenerbit = new ModelPenerbit;
        $this->ModelKategori = new ModelKategori;
        $this->ModelRak = new ModelRak;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'buku',
            'judul' => 'Buku',
            'page' => 'buku/v_index',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'buku',
            'judul' => 'Add Buku',
            'page' => 'buku/v_adddata',
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'pengarang' => $this->ModelPengarang->AllData(),
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if (
            $this->validate([

                'judul_buku' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'kode_buku' => [
                    'label' => 'Kode Buku',
                    'rules' => 'required|is_unique[tbl_buku.kode_buku]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database  !',
                    ]
                ],

                'kode_eksemplar' => [
                    'label' => 'Kode Eksemplar',
                    'rules' => 'required|is_unique[tbl_buku.kode_eksemplar]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database !',
                    ]
                ],

                'eksemplar' => [
                    'label' => 'Eksemplar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required|is_unique[tbl_buku.isbn]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database  !',
                    ]
                ],

                'kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'pengarang' => [
                    'label' => 'Pengarang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'rak' => [
                    'label' => 'Rak',
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

                'jenis_buku' => [
                    'label' => 'Jenis Buku',
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
                    'label' => 'Cover Buku',
                    'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi !',
                        'max_size' => '{field} Max 2048 kb !',
                        'mime_in' => 'Format {field} Harus JPG, PNG, JPEG !',
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
            $id_kategori = $this->getOrCreateKategori(
                trim($this->request->getPost('kategori'))
            );

            $id_pengarang = $this->getOrCreatePengarang(
                trim($this->request->getPost('pengarang'))
            );

            $id_penerbit = $this->getOrCreatePenerbit(
                trim($this->request->getPost('penerbit'))
            );

            $id_rak = $this->getOrCreateRak(
                trim($this->request->getPost('rak'))
            );
            
            $data = [
                'judul_buku' => $this->request->getPost('judul_buku'),
                'kode_buku' => $this->request->getPost('kode_buku'),
                'kode_eksemplar' => $this->request->getPost('kode_eksemplar'),
                'eksemplar' => $this->request->getPost('eksemplar'),
                'isbn' => $this->request->getPost('isbn'),
                'id_kategori' => $id_kategori,
                'id_penerbit' => $id_penerbit,
                'id_pengarang' => $id_pengarang,
                'id_rak' => $id_rak,
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                'tempat_terbit' => $this->request->getPost('tempat_terbit'),
                'jenis_buku' => $this->request->getPost('jenis_buku'),
                'bahasa' => $this->request->getPost('bahasa'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'cover' => $nama_file,
                'id_user' => session()->get('id_user'),
                'tgl_input' => date('Y-m-d'),

            ];

            //memindahkan/upload file cover ke dalam folder cover
            $cover->move('cover', $nama_file);
            $this->ModelBuku->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan!');
            return redirect()->to(base_url('Buku/AddData'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_buku)
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'buku',
            'judul' => 'Edit Buku',
            'page' => 'buku/v_editdata',
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'pengarang' => $this->ModelPengarang->AllData(),
            'rak' => $this->ModelRak->AllData(),
            'buku' => $this->ModelBuku->DetailData($id_buku),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_buku)
    {
        if (
            $this->validate([

                'judul_buku' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'kode_buku' => [
                    'label' => 'Kode Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database  !',
                    ]
                ],

                'kode_eksemplar' => [
                    'label' => 'Kode Eksemplar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Ada Di Database !',
                    ]
                ],

                'eksemplar' => [
                    'label' => 'Eksemplar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],

                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
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

                'id_rak' => [
                    'label' => 'Rak',
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

                'jenis_buku' => [
                    'label' => 'Jenis Buku',
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
                    'label' => 'Cover Buku',
                    'rules' => 'max_size[cover,2048]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => '{field} Max 2048 kb !',
                        'mime_in' => 'Format {field} Harus JPG, PNG, JPEG !',
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
            if ($cover->getError() == 4) {
                //tanpa ganti cover
                $data = [
                    'id_buku' => $id_buku,
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'kode_buku' => $this->request->getPost('kode_buku'),
                    'kode_eksemplar' => $this->request->getPost('kode_eksemplar'),
                    'eksemplar' => $this->request->getPost('eksemplar'),
                    'isbn' => $this->request->getPost('isbn'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_penerbit' => $this->request->getPost('id_penerbit'),
                    'id_pengarang' => $this->request->getPost('id_pengarang'),
                    'id_rak' => $this->request->getPost('id_rak'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'tempat_terbit' => $this->request->getPost('tempat_terbit'),
                    'jenis_buku' => $this->request->getPost('jenis_buku'),
                    'bahasa' => $this->request->getPost('bahasa'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                ];
                $this->ModelBuku->EditData($data);
            } else {
                //ganti cover, hapus cover lama
                $buku = $this->ModelBuku->DetailData($id_buku);
                // jika file cover tidak kosong, maka cover lama akan dihapus dari file cover
                if ($buku['cover'] != "") {
                    unlink('cover/' . $buku['cover']);
                }

                //jika ganti cover
                $nama_file = $cover->getRandomName();
                $data = [
                    'id_buku' => $id_buku,
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'kode_buku' => $this->request->getPost('kode_buku'),
                    'kode_eksemplar' => $this->request->getPost('kode_eksemplar'),
                    'eksemplar' => $this->request->getPost('eksemplar'),
                    'isbn' => $this->request->getPost('isbn'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_penerbit' => $this->request->getPost('id_penerbit'),
                    'id_pengarang' => $this->request->getPost('id_pengarang'),
                    'id_rak' => $this->request->getPost('id_rak'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'tempat_terbit' => $this->request->getPost('tempat_terbit'),
                    'jenis_buku' => $this->request->getPost('jenis_buku'),
                    'bahasa' => $this->request->getPost('bahasa'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'cover' => $nama_file,

                ];

                //memindahkan/upload file cover ke dalam folder cover
                $cover->move('cover', $nama_file);
                $this->ModelBuku->EditData($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
            return redirect()->to(base_url('Buku'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/EditData/' . $id_buku));
        }
    }

    public function DeleteData($id_buku)
    {
        //hapus cover
        $buku = $this->ModelBuku->DetailData($id_buku);
        //jika file cover tidak kosong, maka cover lama akan dihapus dari file foto
        if ($buku['cover'] <> '') {
            unlink('cover/' . $buku['cover']);
        }

        $data = ['id_buku' => $id_buku];
        $this->ModelBuku->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('Buku'));
    }

    public function Filter()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'buku',
            'judul' => 'Filter Buku',
            'page' => 'buku/v_index',
            'buku' => $this->ModelBuku->FilterTanggal($tgl_awal, $tgl_akhir),
        ];

        return view('v_template_admin', $data);
    }
}