<?php

class Admin extends Controller {

    public function __construct()
    {
        if (!isset($_SESSION['user'])){

            header('Location: /auth/formLogin');
            Flasher::setModalInfo('kamu belum login', 'silahkan login dulu', 'error');
            exit;
        }

        if ($_SESSION['role'] !== 'Admin' and $_SESSION['role'] !== 'Superadmin'){ 
            Flasher::setModalInfo('Akses ditolak', 'anda bukan admin', 'error');
            header('Location: /dashboard');
            exit;
        }
    }

    public function index(){
        $data['judul'] = 'Dashboard Admin';
        $data['navbar'] = 'dashboard';
        $this->view('layout/sidebar', $data);
        $this->view('admin/index');

    }
    
    public function Anggota(){

        $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'approval';

        if ($activeTab == 'approval') {
            $data['users'] = $this->model('UserModel')->getUserForAdmin();
        } else {
            $data['users'] = $this->model('UserModel')->getAllUsersPaginated(10, 0);
        }

        foreach ($data['users'] as &$user) {
            $user['createdDate'] = tanggal_indonesia($user['created_at']);
        }
        $data['judul'] = 'Data Anggota';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/index', $data);
    }

    // public function detailAnggota($id = null){

    //     $id = param_number($id, "ID user tidak valid");
    //     $data['user'] = $this->model('UserModel')->getUserById($id);
    //     $data['judul'] = 'Detail Anggota';
    //     $data['navbar'] = 'Anggota';
    //     $this->view('layout/sidebar', $data);
    //     $this->view('admin/anggota/detail', $data);
    // }

    public function Selesaikan($id_user = null){

        $id = param_number($id_user, "ID ruangan tidak valid");

        if ($id  === false || $id  < 1) {
            Flasher::setModalInfo('Parameter Salah', 'hayooo ubah-ubah parameter yaa?', 'error');
            header('Location: /admin'); // Redirect ke halaman login
            exit;
        }

        $data['user'] = $this->model('userModel')->getUserById($id_user);
        $data['createdDate'] = tanggal_indonesia($data['user']['created_at']);
        $data['judul'] = 'Selesaikan Peminjaman';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/selesaikan', $data);
    }
    
    public function peminjaman(){
        $data['judul'] = 'Peminjaman';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/index');
    }

    public function hariIni(){
        $data['judul'] = 'Detail Peminjaman Hari Ini';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/detailHariIni');
    }

    public function buatBooking(){
        $data['judul'] = 'Buat Pinjaman Baru';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/Peminjaman/buatBooking');
    }

    public function Ruangan(){
        $data['judul'] = 'Data Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('layout/sidebar', $data);
        $this->view('admin/ruangan/index');
    }

    public function dataRuangan(){
        // $data['ruangan'] = $this->model('RuanganModel')->getAllRooms 
        $data['judul'] = 'Detail Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('layout/sidebar', $data);
        $this->view('admin/ruangan/dataRuangan');
    }

    public function Akun(){
        $data['judul'] = 'Profile Admin';
        $data['navbar'] = 'Akun';
        $this->view('layout/sidebar', $data);
        $this->view('admin/akun/index');
    }

    public function gantiPassword(){
        $data['judul'] = 'Ganti Password';
        $data['navbar'] = 'Akun';
        $this->view('layout/sidebar', $data);
        $this->view('admin/akun/gantiPassword');
    }

    public function hapusAkun(){
        $data['judul'] = 'Hapus Akun';
        $data['navbar'] = 'Akun';
        $this->view('layout/sidebar', $data);
        $this->view('admin/akun/hapusAkun');
    }

    public function handleApprove(){

        try{

        if (empty($_POST['id_user'])) {
            throw new Exception('Error id_user tidak ada');
        }


        $result = $this->model('UserModel')->activateUser($_POST['id_user']);
        if ($result === 0 ) {
            throw new Exception('internal sql error');
        }

        Flasher::setModalInfo('Berhasil Approve Anggota', 'Akun anggota sudah bisa digunakan');
        header('location: /admin/anggota');
        exit();

        }catch(Throwable $e){
            Flasher::setModalInfo('Gagal Aktivasi User', $e->getMessage());
            header('location: /admin/anggota');
            exit();
        }
    }

}