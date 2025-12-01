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

    public function getAllRescheduleByIdUser($id_user){
        $this->db->query("SELECT rs.start_time  FROM reschedule rs WHERE id_user = :id_user");
        $this->db->bind('id_user', $id_user);
        return $this->db->resultSet();
    }


    //ini ambil data buat detail reschedule
    public function getRescheduleDetail($id_res) {
        $query = "SELECT rs.id_booking, rs.id_reschedule, rs.new_start_time, rs.new_end_time,rs.status_reschedule,
         r.room_name, r.min_capacity, r.max_capacity, r.floor, r.description, b.booking_code,
                u.username, u.jurusan_unit, u.nomor_induk 
                FROM reschedule rs 
                JOIN bookings b ON rs.id_booking = b.id_booking
                JOIN rooms r ON b.id_room = r.id_room 
                JOIN users u ON b.id_user = u.id_user
                WHERE rs.id_reschedule = :id_res";

        $this->db->query($query);
        $this->db->bind('id_res', $id_res);
        return $this->db->singleSet();
    }


    //ini pending yang paling atas
    public function getAllRescheduleRequests(){
        $query = "SELECT 
                r.id_reschedule, r.new_start_time AS start_time, r.new_end_time AS end_time,
                r.status_reschedule as status, r.id_reschedule,
                rm.room_name,
                b.booking_code, u.username
              FROM reschedule r
              JOIN bookings b ON r.id_booking = b.id_booking
              JOIN rooms rm ON b.id_room = rm.id_room
              JOIN users u ON b.id_user = u.id_user
              ORDER BY 
                CASE WHEN r.status_reschedule = 'pending' THEN 0 ELSE 1 END,
                r.created_at DESC";
                
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getRescheduleMembers($id_res){
        $this->db->query("SELECT u.username, u.id_user FROM reschedule_members rm 
                        JOIN users u ON rm.id_user = u.id_user
                        WHERE rm.id_reschedule = :id_res");
        $this->db->bind('id_res', $id_res);
        return $this->db->resultSet();
    }

    //ini menghitung ada berapa members reschedule untuk rescheduelan itu
    public function countRescheduleMembers($id_reschedule) {
        $query = "SELECT count(*) as total FROM reschedule_members WHERE id_reschedule = :id";
        $this->db->query($query);
        $this->db->bind('id', $id_reschedule);
        return $this->db->singleSet()['total'];
    }

    public function updateStatus($id_reschedule, $status) {
        $query = "UPDATE reschedule SET status_reschedule = :status WHERE id_reschedule = :id";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id_reschedule);
        $this->db->execute();
        return $this->db->rowCount();
    }


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

    public function getRescheduleJoinBooking($id_reschedule) {
    $query = "SELECT r.*, b.id_room, b.booking_code, 
                     b.start_time as old_start, 
                     b.end_time as old_end
              FROM reschedule r
              JOIN bookings b ON r.id_booking = b.id_booking
              WHERE r.id_reschedule = :id";
              
    $this->db->query($query);
    $this->db->bind('id', $id_reschedule);
    return $this->db->singleSet();
}

}