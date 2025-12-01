<?php

class RescheduleModel {

    private $table = 'reschedule';
    private $db;

    public function __construct(){
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

    public function getReschedulebyBookingId($id_booking){
        $this->db->query("SELECT * FROM reschedule WHERE id_booking = :id_booking");
        $this->db->bind('id_booking', $id_booking);
        return $this->db->resultSet();
    }

    // Di dalam BookingModel.php

// Create Data Reschedule Header
public function createReschedule($data){
        $query = "INSERT INTO reschedule 
                (id_booking, reschedule_reason, status_reschedule, new_start_time, new_end_time, created_at)
                VALUES 
                (:id_booking, :reason, :status, :start, :end, CURRENT_TIMESTAMP)";
    
        $this->db->query($query);
        $this->db->bind('id_booking', $data['id_booking']);
        $this->db->bind('reason', $data['reschedule_reason']);
        $this->db->bind('status', $data['status_reschedule']);
        $this->db->bind('start', $data['new_start_time']);
        $this->db->bind('end', $data['new_end_time']);
    
        $this->db->execute();
        return $this->db->lastInsertId();
    }

// Create Data Member Reschedule
    public function insertRescheduleMember($id_reschedule, $id_user){
    $query = "INSERT INTO reschedule_members (id_reschedule, id_user) VALUES (:id_res, :id_user)";
    
    $this->db->query($query);
    $this->db->bind('id_res', $id_reschedule);
    $this->db->bind('id_user', $id_user);
    
    $this->db->execute();
    }

}