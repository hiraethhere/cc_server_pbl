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
}