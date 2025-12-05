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

            $user = $this->model('UserModel')->getSuspendCount($_SESSION['user']['user_id']);

            if ($user >= 3) {
                session_destroy();
                header("Location: /auth/handleLogout");
                exit;
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

    public function submiFeedback(){
        // 1. Ambil raw data JSON dari request body
    $json = file_get_contents('php://input');
    
    // 2. Decode menjadi Array PHP
    $input = json_decode($json, true);

    if (!$input) {
        echo json_encode(['status' => 'error', 'message' => 'Data invalid']);
        exit;
    }

    // 3. Ambil variabelnya
    $bookingId = $input['bookingId'];
    $rating = $input['rating'];
    $ulasan = $input['ulasan'];

    // 4. Panggil Model untuk simpan ke database
    // Pastikan kamu punya method ini di BookingModel
    $result = $this->model('FeedbackModel')->addFeedback($bookingId, $rating, $ulasan);

    // 5. Kirim respon balik ke JavaScript
    header('Content-Type: application/json');
    if ($result > 0) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan ke database']);
    }
    }

}