<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelKelas;


class Auth extends BaseController
{
    protected $ModelAuth;
    protected $ModelKelas;
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth;
        $this->ModelKelas = new ModelKelas;
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login'
        ];
        return view('v_template_login', $data);
    }

    public function LoginUser()
    {
        $data = [
            'judul' => 'Login User',
            'page' => 'v_login_user'
        ];
        return view('v_template_login', $data);
    }

    public function CekLoginUser()
    {
        if (
            $this->validate([
                'email' => [
                    'label' => 'E-Mail',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                        'valid_email' => '{field} Harus Format E-Mail !',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                    ]
                ]
            ])
        ) {
            //jika entry valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginUser($email, $password);
            if ($cek_login) {
                //jika login berhasil
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email']);
                session()->set('level', $cek_login['level']);
                return redirect()->to(base_url('Admin'));
            } else {
                //jika gagal login karena email atau password salah
                session()->setFlashdata('pesan', 'E-Mail atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginUser'));
            }
        } else {
            //jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginUser'));
        }
    }

    public function LoginPengunjung()
    {
        $data = [
            'judul' => 'Login Pengunjung',
            'page' => 'v_login_pengunjung'
        ];
        return view('v_template_login', $data);
    }

    public function LogOut()
    {
        session()->setFlashdata('pesan', 'Logout Sukses !');
        session()->destroy();
        return redirect()->to(base_url('Auth/LoginUser'));
    }

    public function LogOutPengunjung()
    {
        session()->setFlashdata('pesan', 'Logout Sukses !');
        session()->destroy();
        return redirect()->to(base_url('Auth'));
    }

    public function Register()
    {
        $data = [
            'judul' => 'Daftar Pengunjung',
            'page' => 'v_daftar_pengunjung',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_login', $data);
    }

    public function Daftar()
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
                'ulangi_password' => [
                    'label' => 'Ulangi Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                        'matches' => '{field} Tidak Sama Dengan Password Sebelumnya !',
                    ]
                ],
            ])
        ) {
            //jika lolos validasi
            $data = [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'verifikasi' => 'null',
                'tgl_input' => date('Y-m-d'), //
            ];
            $this->ModelAuth->Daftar($data);
            session()->setFlashdata('pesan', 'Pendafataran Berhasil !, Silahkan Login!');
            return redirect()->to(base_url('Auth/Register'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function CekLoginPengunjung()
    {

        if (
            $this->validate([
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                        'valid_email' => '{field} Tidak Valid !',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Masih Kosong !',
                    ]
                ]
            ])
        ) {
            //jika entry valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginPengunjung($email, $password);
            if ($cek_login) {
                //jika login berhasil
                session()->set([
                    'id_pengunjung' => $cek_login['id_pengunjung'],
                    'email' => $cek_login['email'],
                    'id_kelas' => $cek_login['id_kelas'],
                    'level' => 'Pengunjung',
                ]);

                return redirect()->to(base_url('DashboardPengunjung'));
            } else {
                session()->setFlashdata('pesan', 'E-Mail atau Password Salah!');
                return redirect()->to(base_url('Auth/LoginPengunjung'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginPengunjung'));
        }
    }
}