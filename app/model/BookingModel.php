<?php

class BookingModel {
    private $table = 'bookings';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function beginTransaction() {
        return $this->db->beginTransaction();
    }

    public function commit() {
        return $this->db->commit();
    }

    public function rollBack() {
        return $this->db->rollBack();
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }

    // Mengambil jadwal yang sudah ter-booking berdasarkan ruangan dan tanggal
    public function getBookingsByRoomAndDate($roomId, $date)
    {

    $query = "SELECT start_time, end_time 
              FROM " . $this->table . " 
              WHERE id_room = :id_room 
              AND DATE(start_time) = :date AND status NOT IN ('ongoing', 'cancelled')";
    
    $this->db->query($query);
    $this->db->bind('id_room', $roomId);
    $this->db->bind('date', $date);
    
    return $this->db->resultSet();
    }

    public function roomCheck($id_room, $end_req, $start_req){
        $query = "SELECT COUNT(*) as total FROM bookings WHERE id_room = :id_room
                  AND STATUS NOT IN ('rejected', 'cancelled', 'done')
                  AND (start_time < :end_req AND end_time > :start_req)";

        $this->db->query($query);
        $this->db->bind('id_room', $id_room);
        $this->db->bind('end_req', $end_req, PDO::PARAM_STR);
        $this->db->bind('start_req', $start_req, PDO::PARAM_STR);

        return $this->db->singleSet();
    }

    public function createBooking($data){

        $query = "INSERT INTO bookings (id_room, id_user,total_person, booking_code, start_time, end_time, status, created_at) 
                  VALUES (:id_room, :id_user, :total_person, :booking_code, :start, :end, 'active', NOW())";
        
        $this->db->query($query);
        $this->db->bind('id_room', $data['id_room']);
        $this->db->bind('id_user', $data['id_user']); // penanggung jawab
        $this->db->bind('total_person', $data['total_person']);
        $this->db->bind('booking_code', $data['booking_code']);
        $this->db->bind('start', $data['start_time'], PDO::PARAM_STR);
        $this->db->bind('end', $data['end_time'], PDO::PARAM_STR);
        $this->db->execute();
        return $this->db->lastInsertId();  
    }

    public function getActiveBookingByUser($id_user){
    // Kita gunakan DISTINCT supaya jika ada join yang berulang, data booking tetap muncul sekali saja.
    // Kita pakai LEFT JOIN ke booking_members agar booking dimana dia jadi Ketua (dan mungkin tidak ada anggota) tetap termuat.
    
    $query = "SELECT DISTINCT b.id_booking, b.start_time FROM bookings b
              LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
              WHERE (b.id_user = :uid OR bm.id_user = :uid)
              AND b.status IN ('pending', 'active', 'ongoing')
              ORDER BY b.start_time DESC LIMIT 1";

    $this->db->query($query);
    $this->db->bind('uid', $id_user);
    
    return $this->db->singleSet();
    }

    public function getBookingIdByUser($id_user){
    // Kita gunakan DISTINCT supaya jika ada join yang berulang, data booking tetap muncul sekali saja.
    // Kita pakai LEFT JOIN ke booking_members agar booking dimana dia jadi Ketua (dan mungkin tidak ada anggota) tetap termuat.
    
    $query = "SELECT DISTINCT b.id_booking, b.start_time FROM bookings b
              LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
              WHERE (b.id_user = :uid OR bm.id_user = :uid)
              ORDER BY b.start_time DESC";

    $this->db->query($query);
    $this->db->bind('uid', $id_user);
    
    return $this->db->resultSet();
    }

    public function getAllBookingByUser($id_user){
    // Kita select f.id_feedback juga untuk logika tombol di View nanti
        $query = "SELECT DISTINCT 
                b.id_booking, 
                b.start_time, 
                b.end_time,
                r.room_name,
                b.status, 
              FROM bookings b
              
              LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
              
              
              
              WHERE (b.id_user = :uid OR bm.id_user = :uid)
              
              ORDER BY b.tanggal DESC";

        $this->db->query($query);
        $this->db->bind('uid', $id_user);
        return $this->db->resultSet(); 
    }

    public function getActiveBookingJoinRoom($id_booking){
        $query = "SELECT b.id_booking, b.start_time, b.status, b.end_time, b.total_person, b.booking_code, r.room_name, r.short_description
                FROM bookings b JOIN rooms r ON b.id_room = r.id_room
                WHERE b.status IN ('pending', 'active', 'ongoing') AND b.id_booking = :id_booking";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->execute();
        return $this->db->singleSet();
    }

    public function insertBookingMember($id_booking, $id_user){
        $query = "INSERT INTO booking_members (id_booking, id_user)
                    VALUES (:id_booking, :id_user)";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_user', $id_user); 
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function checkUserQuota($id_user, $range_start, $range_end){
        // Cek tabel bookings apakah user pernah booking sebagai ketua?
        $query1 = "SELECT COUNT(*) as total FROM bookings 
                WHERE id_user = :uid 
                AND status IN ('pending', 'active', 'ongoing')
                AND start_time BETWEEN :range_start AND :range_end";
        
        $this->db->query($query1);
        $this->db->bind('uid', $id_user);
        $this->db->bind('range_start', $range_start);
        $this->db->bind('range_end', $range_end);
        $res1 = $this->db->singleSet();

        if($res1['total'] > 0) return false; // Gagal, sudah ada jadwal

        // Cek tabel booking_members apakah dia ada booking sebagai anggota?
        $query2 = "SELECT COUNT(*) as total FROM booking_members bm
                JOIN bookings b ON bm.id_booking = b.id_booking
                WHERE bm.id_user = :uid
                AND b.status IN ('pending', 'approved', 'ongoing')
                AND b.start_time BETWEEN :range_start AND :range_end";
               
        $this->db->query($query2);
        $this->db->bind('uid', $id_user);
        $this->db->bind('range_start', $range_start);
        $this->db->bind('range_end', $range_end);
        $res2 = $this->db->singleSet();

        if($res2['total'] > 0) return false; // Gagal

        return true; // user tidak memiliki booking
    }


    public function cancelBooking($id_booking){
        $query = "UPDATE bookings SET status = 'cancelled', cancel_by = 'user' WHERE id_booking = :id_booking";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->execute();
        return $this->db->rowCount();
    }
}