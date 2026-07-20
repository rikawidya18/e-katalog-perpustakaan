<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPengunjung;
use App\Models\ModelKelas;
use App\Models\ModelEbook;

class Pengunjung extends BaseController
{
    protected $ModelPengunjung;
    protected $ModelKelas;
    protected $ModelEbook;
    public function __construct()
    {
        helper('form');
        $this->ModelPengunjung = new ModelPengunjung();
        $this->ModelKelas = new ModelKelas;
        $this->ModelEbook = new ModelEbook;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterpengunjung',
            'submenu' => 'pengunjung',
            'judul' => 'Pengunjung',
            'page' => 'pengunjung/v_index',
            'pengunjung' => $this->ModelPengunjung->AllData(),
            'ebook' => $this->ModelEbook->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Verifikasi($id_pengunjung)
    {
        $data = [
            'id_pengunjung' => $id_pengunjung,
            'verifikasi' => session()->get('id_user'),
            'tgl_verifikasi' => date('Y-m-d H:i:s'),
        ];
        $this->ModelPengunjung->EditData($data);
        session()->setFlashdata('pesan', 'Pengunjung Berhasil Di Verifikasi');
        return redirect()->to(base_url('Pengunjung'));
    }

    public function AddData()
    {
        $data = [
            'menu' => 'masterpengunjung',
            'submenu' => 'pengunjung',
            'judul' => 'Tambah Data Pengunjung',
            'page' => 'pengunjung/v_adddata',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if (
            $this->validate([
                'id_kelas' => [
                    'label' => 'Kategori Pengunjung',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Belum Dipilih !',
                    ]
                ],
                'nama_pengunjung' => [
                    'label' => 'Nama Pengunjung',
                    'rules' => 'required', //untuk menambahkan rules dapat dilihat di codeigniter 4 user guide
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                    ]
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'usia' => [
                    'label' => 'Usia',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'no_hp' => [
                    'label' => 'No Handphone',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'email' => [
                    'label' => 'E-Mail',
                    'rules' => 'required|is_unique[tbl_pengunjung.email]',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Terdaftar, Gunakan E-mail Lain !',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'kecamatan' => [
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'kota_kabupaten' => [
                    'label' => 'Kota/Kabupaten',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'provinsi' => [
                    'label' => 'Provinsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'foto' => [
                    'label' => 'Foto Pengunjung',
                    'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi !',
                        'max_size' => '{field} Max 1024 kb !',
                        'mime_in' => 'Format {field} Harus JPG, PNG, JPEG !',
                    ]
                ],
            ])
        ) {
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();

            $data = [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'usia' => $this->request->getPost('usia'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'alamat' => $this->request->getPost('alamat'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
                'provinsi' => $this->request->getPost('provinsi'),
                'foto' => $nama_file,
                'verifikasi' => '1',
                'tgl_input' => date('Y-m-d'),
            ];
            $foto->move('foto', $nama_file);
            $this->ModelPengunjung->AddData($data);
            session()->setFlashdata('pesan', 'Data Pengunjung Berhasil Disimpan !');
            return redirect()->to(base_url('Pengunjung/AddData'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Pengunjung/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_pengunjung)
    {
        $data = [
            'menu' => 'masterpengunjung',
            'submenu' => 'pengunjung',
            'judul' => 'Edit Data Pengunjung ',
            'page' => 'pengunjung/v_editdata',
            'kelas' => $this->ModelKelas->AllData(),
            'pengunjung' => $this->ModelPengunjung->DetailData($id_pengunjung),
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateData($id_pengunjung)
    {
        if (
            $this->validate([
                'id_kelas' => [
                    'label' => 'Kategori Pengunjung',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Belum Dipilih !',
                    ]
                ],
                'nama_pengunjung' => [
                    'label' => 'Nama Pengunjung',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                    ]
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'usia' => [
                    'label' => 'Usia',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],                
                'no_hp' => [
                    'label' => 'No Handphone',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'email' => [
                    'label' => 'E-Mail',
                    // NOTE: email harus mengabaikan email lama!
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                        'is_unique' => '{field} Sudah Terdaftar, Gunakan E-mail Lain !',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'kecamatan' => [
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'kota_kabupaten' => [
                    'label' => 'Kota/Kabupaten',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'provinsi' => [
                    'label' => 'Provinsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !',
                    ]
                ],
                'foto' => [
                    'label' => 'Foto Pengunjung',
                    'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => '{field} Max 1024 kb !',
                        'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !',
                    ]
                ],
            ])
        ) {

            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            $pengunjung = $this->ModelPengunjung->DetailData($id_pengunjung);

            // JIKA TIDAK GANTI FOTO
            if ($foto->getError() == 4) {
                $data = [
                    'id_pengunjung' => $id_pengunjung,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'usia' => $this->request->getPost('usia'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'alamat' => $this->request->getPost('alamat'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'verifikasi' => '1',
                    'foto' => $pengunjung['foto'], // foto akan tampil sesuai yang ada
                ];

            } else {

                // HAPUS FOTO LAMA
                if ($pengunjung['foto'] <> '') {
                    unlink('foto/' . $pengunjung['foto']);
                }

                // UPLOAD FOTO BARU
                $nama_file = $foto->getRandomName();
                $foto->move('foto', $nama_file);

                //JIKA GANTI FOTO
                $data = [
                    'id_pengunjung' => $id_pengunjung,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'usia' => $this->request->getPost('usia'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'alamat' => $this->request->getPost('alamat'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'foto' => $nama_file, //foto akan diperbarui sesuai yg diupload
                    'verifikasi' => '1',
                ];
            }

            // SIMPAN KE DATABASE
            $this->ModelPengunjung->EditData($data);

            session()->setFlashdata('pesan', 'Data Pengunjung Berhasil Diupdate!');
            return redirect()->to(base_url('Pengunjung'));

        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Pengunjung/EditData/' . $id_pengunjung))->withInput();
        }
    }

    public function DeleteData($id_pengunjung)
    {
        //hapus foto
        $pengunjung = $this->ModelPengunjung->DetailData($id_pengunjung);
        //jika file foto tidak kosong, maka foto lama akan dihapus dari file foto
        if ($pengunjung['foto'] <> '') {
            unlink('foto/' . $pengunjung['foto']);
        }

        $data = ['id_pengunjung' => $id_pengunjung];
        $this->ModelPengunjung->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('Pengunjung'));
    }

    public function Filter()
    {
        $tgl_awal = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        $data = [
            'menu' => 'masterpengunjung',
            'submenu' => 'pengunjung',
            'judul' => 'Filter Pengunjung',
            'page' => 'pengunjung/v_index',
            'pengunjung' => $this->ModelPengunjung->FilterTanggal($tgl_awal, $tgl_akhir),
        ];

        return view('v_template_admin', $data);
    }

}