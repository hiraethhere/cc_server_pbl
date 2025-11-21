<?php

class BookingModel {
    private $table = 'bookings';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Mengambil jadwal yang sudah ter-booking berdasarkan ruangan dan tanggal
    public function getBookingsByRoomAndDate($roomId, $date)
    {
    // $date formatnya 'YYYY-MM-DD'
    // DATE(start_time) akan mengambil tanggalnya saja dari datetime 'YYYY-MM-DD HH:mm:ss'
    
    $query = "SELECT start_time, end_time 
              FROM " . $this->table . " 
              WHERE room_id = :room_id 
              AND DATE(start_time) = :date";
    
    $this->db->query($query);
    $this->db->bind('room_id', $roomId);
    $this->db->bind('date', $date);
    
    return $this->db->resultSet();
    }
}