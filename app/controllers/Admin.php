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
           $data['link'] = 'selesaikan';
        } else {
            $data['users'] = $this->model('UserModel')->getAllUsersPaginated(10, 0);
            $data['link'] = 'detailAnggota';
        }

        foreach ($data['users'] as &$user) {
            $user['createdDate'] = tanggal_indonesia($user['created_at']);
            $user['statusStyle'] = getStyleStatus($user['status']);
            $user['status'] = translateStatusUser($user['status']);
        }
        
        $data['judul'] = 'Data Anggota';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/index', $data);
    }

    public function detailAnggota($id = null){

        $id = param_number($id, "ID user tidak valid");
        $data['user'] = $this->model('UserModel')->getUserById($id);
        $data['judul'] = 'Detail Anggota';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/detail', $data);
    }

    public function Selesaikan($id_user = null){

        $id = param_number($id_user, "ID ruangan tidak valid");

        if ($id  === false || $id  < 1) {
            Flasher::setModalInfo('Parameter Salah', 'hayooo ubah-ubah parameter yaa?', 'error');
            header('Location: /admin'); // Redirect ke halaman login
            exit;
        }

        $data['user'] = $this->model('userModel')->getUserJoinRoleById($id_user);
        $data['createdDate'] = tanggal_indonesia($data['user']['created_at']);
        $data['judul'] = 'Selesaikan Peminjaman';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/selesaikan', $data);
    }

    public function selesaikanDosen(){
        $data['judul'] = 'Selesaikan Doses';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/selesaikanDosen');
    }

    public function tambahAnggota(){
        $data['judul'] = 'Tambah Anggota Baru';
        $data['navbar'] = 'Anggota';
        $this->view('layout/sidebar', $data);
        $this->view('admin/anggota/tambahAnggota');
    }
    
    public function peminjaman(){

        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'hariIni';

        switch ($tab) {
            case 'hariIni':
                $data['bookings'] = $this->model('BookingModel')->getBookingTodayJoinRoom();
                $data['link'] = 'hariIni';
                break;
            case 'berlangsung':
                $data['bookings'] = $this->model('BookingModel')->getBookingPendingJoinRoom();
                $data['link'] = 'detailBerlangsung';
                break;
            case 'reschedule':
                $data['bookings'] = $this->model('BookingModel')->getBookingDoneAndCancelledJoinRoom();
                $data['link'] = 'detailReschedule';
                break;
            case 'riwayat':
                $data['bookings'] = $this->model('BookingModel')->getBookingDoneAndCancelledJoinRoom();
                $data['link'] = 'detailRiwayat';
                break;
            default:
                Flasher::setModalInfo('Tab tidak diketahui', 'hayoo ubah ubah parameter yaa', 'error');
                header('location: /admin/peminjaman');
                break;
        }

        $data['judul'] = 'Peminjaman';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/index', $data);
    }

    public function hariIni(){
        $data['judul'] = 'Detail Peminjaman Hari Ini';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/detailHariIni');
    }

    public function detailReschedule(){
        $data['judul'] = 'Detail Reschedule';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/detailReschedule');
    }

    public function detailRiwayat(){
        $data['judul'] = 'Detail Riwayat Peminjaman';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/peminjaman/detailRiwayat');
    }

    public function buatBooking(){
        $data['judul'] = 'Buat Pinjaman Baru';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/Peminjaman/buatBooking');
    }

    public function bookingRuangan(){
        $data['judul'] = 'Buat Pinjaman Baru';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/Peminjaman/bookingRuangan');
    }

    public function bookingRuangRapat(){
        $data['judul'] = 'Buat Pinjaman Baru';
        $data['navbar'] = 'Peminjaman';
        $this->view('layout/sidebar', $data);
        $this->view('admin/Peminjaman/bookingRuangRapat');
    }

    public function Ruangan(){
        $data['judul'] = 'Data Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('layout/sidebar', $data);
        $this->view('admin/ruangan/index');
    }

    public function tambahDataRuangan(){
        $data['judul'] = 'Tambah Data Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('layout/sidebar', $data);
        $this->view('admin/ruangan/tambahRuangan');
    }

    public function EditDataRuangan(){
        $data['judul'] = 'Edit Data Ruangan';
        $data['navbar'] = 'Ruangan';
        $this->view('layout/sidebar', $data);
        $this->view('admin/ruangan/editDataRuangan');
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
        sendEmail($_POST['email'] ?? 'email user', $_POST['username' ?? 'user'], "SELAMAT AKUN ANDA TELAH AKTIF", "anda sekarang bisa login ke ruanginPNJ" );
        Flasher::setModalInfo('Berhasil Approve Anggota', 'Akun anggota sudah bisa digunakan');
        header('location: /admin/anggota');
        exit();

        }catch(Throwable $e){
            Flasher::setModalInfo('Gagal Aktivasi User', $e->getMessage());
            header('location: /admin/anggota');
            exit();
        }
    }

    public function handleDecline(){
        
        try{

        if (empty($_POST['id_user']) || empty($_POST['email'])|| empty($_POST['username'])) {
            throw new Exception('Error id_user tidak ada');
        }

        $result = $this->model('UserModel')->rejectUser($_POST['id_user']);
        if ($result === 0 ) {
            throw new Exception('internal sql error');
        }

        sendEmail($_POST['email'], $_POST['username'], "Mohon Maaf akun anda ditolak", "alasannya: " . ($_POST['alasan'] ?? 'tidak ada alasan spesifik') );
        Flasher::setModalInfo('Berhasil Tolak Anggota', 'Akun anggota sudah ditolak');
        header('location: /admin/anggota');
        exit();

        }catch(Throwable $e){
            Flasher::setModalInfo('Gagal Decline user', $e->getMessage(), 'error');
            header('location: /admin/anggota');
            exit();
        }

    }

        public function handlePasswordChange(){

        //ga boleh kosong
        if (empty($_POST['passwordBaru']) || empty($_POST['passwordLama'])) {
            Flasher::setModalInfo('Password tidak boleh kosong', 'Silahkan isi password', 'error');
            header('location: /admin/akun');
        }

        // kalo beda sama yang confirm maka salah
        if ($_POST['passwordBaru'] !== $_POST['passwordBaruConfirm']) {
            Flasher::setModalInfo('Password tidak sama', 'Silahkan isi password dengan benar', 'error');
            header('location: /admin/akun');
        }

        $oldPassword = $this->model('UserModel')->getPasswordByEmail($_SESSION['user']['email']);
        // var_dump($oldPassword);
        if (!$oldPassword) {
            Flasher::setModalInfo('Akun tidak ditemukan', 'Internal server error', 'error');
            header('location: /admin/akun');
        }

        if (!password_verify($_POST['passwordBaru'], $oldPassword['password'])) {
            Flasher::setModalInfo('Password lama salah', 'Silahkan masukan password yang benar', 'error');
            header('location: /admin/akun');
        }
        
        $data = [
            'password' => password_hash($_POST['passwordBaru'], PASSWORD_DEFAULT),
            'email' => $_SESSION['user']['email']
        ];
        $result = $this->model('UserModel')->updatePassword($data);

        if ($result === 0){
            Flasher::setModalInfo('Password sama dengan yang dulu', 'Gagal update atau Password sama', 'error');
            header('location: /admin/akun');
        }

        Flasher::setModalInfo('Berhasil mengubah Password', 'Password berhasil diubah', 'success', '/admin');
        // header('location: /a');
    }

}