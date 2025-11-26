<?php

class Dashboard extends Controller
{

    public function __construct()
        {
            $this->preventCache();

             if (!isset($_SESSION['user'])) {
            // Jika 'user_id' tidak ada di session (artinya belum login)
            Flasher::setModalInfo('kamu belum login', 'kamu belum login', 'error');
            header('Location: /auth/formLogin'); // Redirect ke halaman login
            exit; //Hentikan eksekusi script
            }

        }
    public function index(){
        // header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        // header("Cache-Control: post-check=0, pre-check=0", false);
        // header("Pragma: no-cache");

        $data['ruangan'] = $this->model('RuanganModel')->getRuanganForDashboard();
        $data['judul'] = 'Dashboard';
        $data['navbar'] = 'Dashboard';
        // var_dump($data['ruangan']);
        $this->view('Layout/Header', $data);
        $this->view('anggota/dashboard/index', $data);
        $this->view('Layout/Footer');
    } 

    public function Booking($id = null){

        $id = param_number($id, "ID ruangan tidak valid");

        if ($id === false || $id < 1) {
            // Flasher::setModalInfo('Parameter Salah', 'hayooo ubah-ubah parameter yaa?', 'error');
            header('Location: /dashboard'); // Redirect ke halaman login
            exit;
        }

        $data['detailRuangan'] = $this->model('RuanganModel')->getRuanganById($id);

    if (!$data['detailRuangan']) {
        http_response_code(404);
        die("Ruangan tidak ditemukan");
    }
        $data['user'] = $_SESSION['user'];
        $data['judul'] = 'Booking Ruangan';
        $this->view('Layout/Header', $data);
        $this->view('anggota/Dashboard/Booking_Ruangan', $data); 
        $this->view('Layout/Footer');
    }

    public function Panduan(){
        $data['judul'] = 'Panduan pakai RuanginPNJ';
        $this->view('Layout/Header', $data);
        $this->view('anggota/panduan/index', $data); 
        $this->view('Layout/Footer');
    }


}
