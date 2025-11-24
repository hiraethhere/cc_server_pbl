<?php

class Admin extends Controller {
    public function index(){
        if (!isset($_SESSION['user'])){
            header('Location: /auth/formLogin');
            exit;
        }

        if ($_SESSION['role'] !== 'Admin' and $_SESSION['role'] !== 'Superadmin'){ 
            Flasher::setFlash('Akses ditolak', 'Anda bukan admin', 'danger');
            header('Location: /dashboard');
            exit;
        }

        $data['judul'] = 'Dashboard Admin';
        $data['navbar'] = 'dashboard';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/index');

    }
    
    public function Anggota(){
        $data['users'] = $this->model('UserModel')->getUserForAdmin();
        $data['judul'] = 'Data Anggota';
        $data['navbar'] = 'Anggota';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Anggota/index', $data);
    }

    public function detailAnggota($id = null){

        $id = param_number($id, "ID user tidak valid");
        $data['user'] = $this->model('UserModel')->getUserById($id);
        $data['judul'] = 'Detail Anggota';
        $data['navbar'] = 'Anggota';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Anggota/detail', $data);
    }

    public function Selesaikan(){
        $data['judul'] = 'Selesaikan Peminjaman';
        $data['navbar'] = 'Anggota';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Anggota/selesaikan');
    }

    public function Ruangan(){
        $data['judul'] = 'Data Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Ruangan/index');
    }

    public function dataRuangan(){
        // $data['ruangan'] = $this->model('RuanganModel')->getAllRooms 
        $data['judul'] = 'Detail Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Ruangan/Data_Ruangan');
    }

    public function Akun(){
        $data['judul'] = 'Profile Admin';
        $data['navbar'] = 'Akun';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Akun/index');
    }

    public function gantiPassword(){
        $data['judul'] = 'Ganti Password';
        $data['navbar'] = 'Akun';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Akun/gantiPassword');
    }

    public function hapusAkun(){
        $data['judul'] = 'Hapus Akun';
        $data['navbar'] = 'Akun';
        $this->view('Layout/Sidebar', $data);
        $this->view('Admin/Akun/hapusAkun');
    }

}