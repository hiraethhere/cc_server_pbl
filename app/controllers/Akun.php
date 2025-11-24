<?php

class Akun extends Controller{

    public function __construct()
        {
            parent::__construct();
            if (!isset($_SESSION['user'])) {
            // Jika 'user_id' tidak ada di session (artinya belum login)
            Flasher::setModalInfo('kamu belum login', 'kamu belum login', 'error');
            header('Location: /auth/formLogin'); // Redirect ke halaman login
            exit; //Hentikan eksekusi script
            }
        }

    public function index(){
            // 1. Tentukan judul halaman
        $data['judul'] = 'Profil Akun';
        $data['user'] = $_SESSION['user'];
        // 3. Panggil view (Urutan pemanggilan harus benar: Header, Body, Footer)
        $this->view('Layout/Header', $data);
        $this->view('anggota/Akun/index', $data); 
        $this->view('Layout/Footer');
    }

    public function gantiPassword(){
        $data['judul'] = 'Ganti Password';
        $this->view('Layout/Header', $data);
        $this->view('anggota/akun/Ganti_Password', $data);
        $this->view('Layout/Footer');
    }

    public function hapusAkun(){
        $data['judul'] = 'Hapus Akun';
        $this->view('Layout/Header', $data);
        $this->view('Akun/Hapus', $data);
        $this->view('Layout/Footer');
    }

    public function handlePasswordChange(){
        if (empty($_POST['passwordBaru']) || empty($_POST['passwordLama'])) {
            Flasher::setModalInfo('Password tidak boleh kosong', 'Silahkan isi password', 'error');
            header('location: /akun/gantiPassword');
        }
    }

    public function forgetPassword(){
        $this->view('Auth/forgetPassword');
    }
}