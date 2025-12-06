<?php

class FeedbackModel{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addFeedback($data)
    {
        $query = "INSERT INTO feedback 
                  (id_booking, id_user, rating, comment) 
                  VALUES (:id_booking, :id_user, :rating, :comment)";

        $this->db->query($query);
        // Binding data
        $this->db->bind('id_booking', $data['id_booking']);
        $this->db->bind('id_user',    $data['id_user']);
        $this->db->bind('rating',     $data['rating']);
        $this->db->bind('comment',     $data['comment']); // Map dari key array 'comment' ke kolom DB 'ulasan'
        $this->db->execute();
        // 1 jika sukses
        return $this->db->rowCount();
    }

    public function getAllFeedBackPaginated($limit, $start){
        $query = "SELECT 
                f.id_feedback, f.rating, f.comment, f.created_at, b.booking_code, b.booker_name, b.start_time, b.end_time, r.room_name, b.booker_name, u.username
                FROM feedback f
                JOIN bookings b ON f.id_booking = b.id_booking
                JOIN rooms r ON b.id_room = r.id_room
                JOIN users u ON f.id_user = u.id_user
                ORDER BY f.created_at DESC 
                LIMIT :limit OFFSET :start";
        
        $this->db->query($query);
        
        // Penting: Pastikan tipe datanya Integer untuk Limit & Offset
        $this->db->bind(':limit', (int)$limit, PDO::PARAM_INT);
        $this->db->bind(':start', (int)$start, PDO::PARAM_INT);
        
        return $this->db->resultSet();
    }

    public function getTotalFeedbackCount()
        {
            $query = "SELECT COUNT(*) AS total
                    FROM feedback f
                    JOIN bookings b ON f.id_booking = b.id_booking
                    JOIN rooms r ON b.id_room = r.id_room
                    JOIN users u ON b.id_user = u.id_user";

            $this->db->query($query);
            return $this->db->singleSet()['total'];
    }

}