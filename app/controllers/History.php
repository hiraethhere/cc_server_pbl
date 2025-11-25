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
        
        $data['judul'] = 'History';
        $data['navbar'] = 'History';
        $this->view('Layout/Header', $data);
        $this->view('anggota/History/index', $data); 
        $this->view('Layout/Footer');
    }

    public function Peminjaman(){

        // ?: katanya bisa nangkep false coy

        $data['booking'] = $this->model('BookingModel')->getActiveBookingByUser($_SESSION['user']['user_id']) ?: [];
        $bookingId = $data['booking']['id_booking'] ?? null;
        $data['activeBooking'] = $bookingId ? $this->model('BookingModel')->getActiveBookingJoinRoom($bookingId): [];

        if ($data['activeBooking']){
        $data['bookingDate'] = tanggal_indonesia($data['activeBooking']['start_time']);
        $data['start_time'] = date('H:i', strtotime($data['activeBooking']['start_time']));
        $data['end_time'] = date('H:i', strtotime($data['activeBooking']['end_time']));
        $data['status'] = translateStatus($data['activeBooking']['status']);
        } else {
        $data['bookingDate'] = '';
        $data['start_time'] = '';
        $data['end_time'] = '';
        $data['status'] = '';
        }
        $data['judul'] = 'Booking Anda';
        $data['navbar'] = 'bookingAnda';
        $this->view('Layout/Header', $data);
        $this->view('anggota/bookingAnda/index', $data); 
        $this->view('Layout/Footer');
    }

    public function Reschedule(){
        
        $data['judul'] = 'Reschedule';
        $data['navbar'] = 'History';
        $this->view('Layout/Header', $data);
        $this->view('History/Reschedule', $data); 
        $this->view('Layout/Footer');
    }
}