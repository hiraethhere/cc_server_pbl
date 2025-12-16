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

    public function handleTambahAdmin(){

        try{

            if (
                empty($_POST['username']) ||
                empty($_POST['email']) ||
                empty($_POST['nomor_induk']) ||
                empty($_POST['password'])
            ) {
                throw new Exception('Semua field harus diisi.');
            }

            //cek apakah ada nip yang sama
            $existingUser = $this->model('UserModel')->findUserByEmailOrNomor_Induk($_POST['email'], $_POST['nomor_induk']);

            if ($existingUser) {
                throw new Exception('Email atau Nomor Induk sudah terdaftar.');
            }

            if (!validateEmailPHP($_POST['email'])) {
                throw new Exception('Format email tidak valid.');
            }


            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'nomor_induk' => $_POST['nomor_induk'],
                'password' => $_POST['password'],
                'id_role' => 2,
                'status' => 'active' // Default status
            ];

            if($this->model('AdminModel')->createAdmin($data) > 0 ){
                Flasher::setModalInfo('Berhasil', 'ditambahkan', 'success');
                header('Location: /superAdmin');
                exit;
            } else {
                throw new Exception('Gagal menambahkan admin baru.');
            }

        } catch (Exception $e){
            Flasher::setModalInfo('Terjadi kesalahan', $e->getMessage(), 'error');
            header('Location: /superAdmin/tambahAdmin');
            exit;
        }
    }
}