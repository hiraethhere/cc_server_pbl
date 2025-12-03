<?php 

class History extends Controller{
    public function __construct()
        {
            parent::__construct();
            if (!isset($_SESSION['user'])) {
            // Jika 'user_id' tidak ada di session (artinya belum login)
            Flasher::setFlash('Anda harus login', 'untuk mengakses halaman ini.', 'danger');
            header('Location: /auth/formLogin'); // Redirect ke halaman login
            exit; //Hentikan eksekusi script
            }
        }

    public function index(){

        $data['current_page'] = 1;
        $data['total_page'] = 1;

        $data['limit'] = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page > 1) ? ($page * $data['limit']) - $data['limit'] : 0;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $idUser = $_SESSION['user']['user_id'];

        if ($search === '') {
        // tanpa pencarian
        $data['bookings'] = $this->model('BookingModel')->getAllBookingByUser($idUser, $data['limit'], $start);

        $total_data = $this->model('BookingModel')->countAllBookingByUser($idUser);
    } else {
        // dengan pencarian
        $data['bookings'] = $this->model('BookingModel')->searchBookingByUser($idUser, $data['limit'], $start, $search);

        $total_data = $this->model('BookingModel')->countSearchBookingByUser($idUser, $search);
    }

        $data['total_page'] = ceil($total_data / $data['limit']);
        $data['current_page'] = $page;
        unset($book); // best practice
        $data['judul'] = 'History';
        $data['navbar'] = 'History';
        $this->view('Layout/Header', $data);
        $this->view('anggota/History/index', $data); 
        $this->view('Layout/Footer');
    }

}