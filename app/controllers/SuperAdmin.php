<?php

class SuperAdmin extends Controller{

    public function __construct()
    {
         if (!isset($_SESSION['user'])){

            header('Location: /auth/formLogin');
            Flasher::setModalInfo('kamu belum login', 'silahkan login dulu', 'error');
            exit;
        }

        if ($_SESSION['role'] !== 'Superadmin'){ 
            Flasher::setModalInfo('Akses ditolak', 'anda bukan admin', 'error');
            header('Location: /dashboard');
            exit;
        }
    }

    public function index(){

        $keyword = $_GET['keyword'] ?? null;

        $data['admins'] = $this->model('AdminModel')->getAllAdmin($keyword);
        $data['judul'] = 'Data Admin';
        $data['navbar'] = 'superAdmin';
        $this->view('layout/sidebar', $data);
        $this->view('admin/superAdmin/index', $data);
    }

    public function detailAdmin(){
        $data['judul'] = 'Detail Data Admin';
        $data['navbar'] = 'superAdmin';
        $this->view('layout/sidebar', $data);
        $this->view('admin/superAdmin/detailAdmin', $data);
    }

    public function tambahAdmin(){
        $data['judul'] = 'Tambah Data Admin';
        $data['navbar'] = 'superAdmin';
        $this->view('layout/sidebar', $data);
        $this->view('admin/superAdmin/tambahAdmin', $data);
    }
}