<?php

class Booking extends Controller {
    
    // Endpoint untuk mengecek jadwal (dipanggil via fetch/AJAX)
    public function cekJadwal()
    {
        // Mengambil data JSON dari request body
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($input['room_id']) || !isset($input['date'])) {
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Parameter tidak lengkap']);
            exit;
        }

        $roomId = $input['room_id'];
        $date = $input['date'];

        // Panggil BookingModel yang baru kita buat
        $bookedSlots = $this->model('BookingModel')->getBookingsByRoomAndDate($roomId, $date);

        // Kembalikan data sebagai JSON
        header('Content-Type: application/json');
        echo json_encode($bookedSlots);
        exit;
    }

    public function cariAnggota(){

    // Ambil data JSON dari fetch
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $nomor_induk = $data['nim'] ?? '';
    if (empty($nomor_induk)) {
        echo json_encode(['error' => 'NIM kosong']);
        return;
    }

    // Panggil Model untuk cari user
    $user = $this->model('UserModel')->getUserByNomor_Induk($nomor_induk);

    // Kembalikan JSON
        header('Content-Type: application/json');
        if ($user) {
            echo json_encode(['nama' => $user['username']]);
        } else {
            echo json_encode(['nama' => null]);
        }
    }

    public function handleBooking(){
        $id_room = $_POST['id_room'];
        $bookingDate = $_POST['tanggalPinjam'];
        $startTime = $_POST['jamMulai'];
        $endTime = $_POST['jamSelesai'];
        $nomorIndukKetua = $_POST['NIM'][0];
        $list_nim_anggota = array_slice($_POST['NIM'], 1); 

        $start_datetime = "$bookingDate $startTime:00";
        $end_datetime   = "$bookingDate $endTime:00";

        $ts = strtotime($bookingDate);
        $range_start = date('Y-m-d 00:00:00', strtotime('monday this week', $ts));
        $range_end   = date('Y-m-d 23:59:59', strtotime('sunday this week', $ts));

        $bookingModel = $this->model('BookingModel');
        $userModel = $this->model('UserModel');


        try {
                $bookingModel->beginTransaction();
                $userKetua = $userModel->getUserByNomor_Induk($nomorIndukKetua);
            if (!$userKetua) {
                throw new Exception('Nomor Induk ketua tidak ditemukan');
            }

            if (!$bookingModel->checkUserQuota($userKetua['id_user'], $range_start, $range_end)) {
                throw new Exception('Ketua sudah ada booking');
            }

            $id_ketua = $userKetua['id_user'];

                $cekRoom = $bookingModel->roomCheck($id_room, $end_datetime, $start_datetime);
            if ($cekRoom['total'] > 0) {
                throw new Exception("Ruangan sudah di booking pada jam itu!");
            }

        $validatedUsers = [];

            foreach ($list_nim_anggota as $nim) {
                $nim = trim($nim);
                if (empty($nim)) continue; // Skip jika kosong

            // Cek User
                $userAnggota = $userModel->getUserByNomor_Induk($nim);
                if(!$userAnggota) throw new Exception("NIM Anggota ($nim) tidak ditemukan.");

                // Cek apakah Anggota ini malah jadi Ketua? (Opsional, validasi biar ga input diri sendiri)
                if($userAnggota['id_user'] == $id_ketua) {
                     throw new Exception("Ketua tidak perlu dimasukkan lagi sebagai anggota.");
                }

            // Cek Kuota Anggota
                if (!$bookingModel->checkUserQuota($userAnggota['id_user'], $range_start, $range_end)) {
                    throw new Exception("Anggota (" . $userAnggota['username'] . ") sudah ada jadwal minggu ini.");
                }

            // Simpan ID anggota yang valid
                $validatedUsers[] = $userAnggota['id_user'];
            }

            $newBookingId = $bookingModel->createBooking([
            'id_room' => $id_room,
            'id_user' => $id_ketua, // <--- Ketua Masuk Sini
            'start_time' => $start_datetime,
            'end_time' => $end_datetime
        ]);

        // Insert Anggota ke booking_members (Loop array validMembers)
        foreach ($validatedUsers as $id_member) {
            // Panggil addMember TANPA role
            $bookingModel->addMember($newBookingId, $id_member); 
        }

        $bookingModel->commit();
        Flasher::setModalInfo('Booking gagal!', 'Jangan telat yaa','success');
        header("Location: /dashboard");

        } catch (\Throwable $e) {
            Flasher::setModalInfo('Booking gagal!', $e->getMessage(),'error');
        }

    }

}