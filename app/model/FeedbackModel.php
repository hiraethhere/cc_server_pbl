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

}