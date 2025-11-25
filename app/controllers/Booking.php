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

    public function storeBooking(){
        

    }

}