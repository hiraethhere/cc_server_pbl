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
              AND DATE(start_time) = :date";
    
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
        $this->db->bind('end_req', $end_req);
        $this->db->bind('start_req', $start_req);

        return $this->db->singleSet();
    }

    public function createBooking($data){

        $query = "INSERT INTO bookings (id_room, id_user, start_time, end_time, status, created_at) 
                  VALUES (:id_room, :id_user, :start, :end, 'pending', NOW())";
        
        $this->db->query($query);
        $this->db->bind('id_room', $data['id_room']);
        $this->db->bind('id_user', $data['id_user']); // penanggung jawab
        $this->db->bind('start', $data['start_time']);
        $this->db->bind('end', $data['end_time']);

        $this->db->execute();
        return $this->db->lastInsertId();  
    }

    public function insertBookingMember($id_user, $id_booking){
        $query = "INSERT INTO booking_members (id_booking, id_user)
                    VALUES (:id_booking, :id_user)";
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_user', $id_user); 
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function checkUserQuota($id_user, $range_start, $range_end){
        // Cek tabel bookings apakah user pernah booking sebagai ketua?
        $query1 = "SELECT COUNT(*) as total FROM bookings 
                WHERE id_user = :uid 
                AND status IN ('pending', 'approved', 'ongoing')
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



}