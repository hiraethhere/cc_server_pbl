<?php 

class RuanganModel {

    private $table = 'rooms';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getRuanganForDashboard(){
        $this->db->query("SELECT id_room, room_name, img_room, short_description, floor, max_capacity, min_capacity, status FROM ". $this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getRuanganById($id_room){
        $this->db->query("SELECT * FROM  " .  $this->table . " WHERE id_room = :id_room");
        $this->db->bind(':id_room', $id_room);
        $this->db->execute();
        return $this->db->singleSet();
    }

    public function getRuanganWithRating($id_room)
{
    $query = "SELECT r.*, a.announcement_content,
            IFNULL(AVG(f.rating), 0) AS avg_rating,
            COUNT(f.id_feedback) AS total_review
            FROM rooms r
            LEFT JOIN announcement a ON r.id_announcement = a.id_announcement 
            LEFT JOIN bookings b ON r.id_room = b.id_room
            LEFT JOIN feedback f ON b.id_booking = f.id_booking
            WHERE r.id_room = :id_room
            GROUP BY r.id_room
    ";

    $this->db->query($query);
    $this->db->bind(':id_room', $id_room);
    $this->db->execute();
    return $this->db->singleSet();
}

}