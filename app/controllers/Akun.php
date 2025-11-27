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

        //ga boleh kosong
        if (empty($_POST['passwordBaru']) || empty($_POST['passwordLama'])) {
            Flasher::setModalInfo('Password tidak boleh kosong', 'Silahkan isi password', 'error');
            header('location: /akun/gantiPassword');
        }

        // kalo beda sama yang confirm maka salah
        if ($_POST['passwordBaru'] !== $_POST['passwordBaruConfirm']) {
            Flasher::setModalInfo('Password tidak sama', 'Silahkan isi password dengan benar', 'error');
            header('location: /akun/gantiPassword');
        }

        $oldPassword = $this->model('UserModel')->getPasswordByEmail($_SESSION['user']['email']);
        // var_dump($oldPassword);
        if (!$oldPassword) {
            Flasher::setModalInfo('Akun tidak ditemukan', 'Internal server error', 'error');
            header('location: /akun/gantiPassword');
        }

        if (!password_verify($_POST['passwordBaru'], $oldPassword['password'])) {
            Flasher::setModalInfo('Password lama salah', 'Silahkan masukan password yang benar', 'error');
            header('location: /akun/gantiPassword');
        }
        
        $data = [
            'password' => password_hash($_POST['passwordBaru'], PASSWORD_DEFAULT),
            'email' => $_SESSION['user']['email']
        ];
        $result = $this->model('UserModel')->updatePassword($data);

        if ($result === 0){
            Flasher::setModalInfo('Password sama dengan yang dulu', 'Gagal update atau Password sama', 'error');
            header('location: /akun/gantiPassword');
        }

        Flasher::setModalInfo('Berhasil mengubah Password', 'Password berhasil diubah', 'success', '/akun');
        // header('location: /a');


    }

    public function forgetPassword(){
        $this->view('Auth/forgetPassword');
    }
}