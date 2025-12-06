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
              AND DATE(start_time) = :date AND status NOT IN ('done', 'cancelled')";
    
    $this->db->query($query);
    $this->db->bind('id_room', $roomId);
    $this->db->bind('date', $date);
    
    return $this->db->resultSet();
    }

    //ini pengecekan apakah ada booking yang nabrak di rentang waktu segitu?
    public function roomCheck($id_room, $end_req, $start_req, $exclude_id = NULL){
        $query = "SELECT COUNT(*) as total FROM bookings WHERE id_room = :id_room
                  AND STATUS NOT IN ('rejected', 'cancelled', 'done')
                  AND (start_time < :end_req AND end_time > :start_req)";
        if ($exclude_id != NULL) {
        $query .= " AND id_booking != :exclude_id"; 
        }

        $this->db->query($query);
        $this->db->bind('id_room', $id_room);
        $this->db->bind('end_req', $end_req, PDO::PARAM_STR);
        $this->db->bind('start_req', $start_req, PDO::PARAM_STR);
        if ($exclude_id != NULL) {
        $this->db->bind('exclude_id', $exclude_id);
        }

        return $this->db->singleSet();
    }

    public function createBooking($data){

        $query = "INSERT INTO bookings (id_room, id_user,total_person, booking_code, start_time, end_time, status, created_at) 
                  VALUES (:id_room, :id_user, :total_person, :booking_code, :start, :end, 'pending', NOW())";
        
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
              AND b.status IN ('pending', 'ongoing')
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


public function getAllBookingByUser($id_user, $limit, $offset) {
        $sql = "SELECT DISTINCT b.id_booking, r.room_name, b.start_time, b.end_time,
                    b.total_person, b.status, b.created_at, f.rating
                FROM bookings b
                JOIN rooms r ON b.id_room = r.id_room
                LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
                LEFT JOIN feedback f ON b.id_booking = f.id_booking AND f.id_user = :id_user
                WHERE b.id_user = :id_user OR bm.id_user = :id_user
                ORDER BY b.start_time DESC
                LIMIT :limit OFFSET :offset";

        $this->db->query($sql);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('limit', (int)$limit, PDO::PARAM_INT);
        $this->db->bind('offset', (int)$offset, PDO::PARAM_INT);

        return $this->db->resultSet();
    }


    public function countAllBookingByUser($id_user){
        $this->db->query("SELECT COUNT(DISTINCT b.id_booking) AS total
                        FROM bookings b
                        LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
                        WHERE b.id_user = :id_user OR bm.id_user = :id_user");
        $this->db->bind('id_user', $id_user);
        return $this->db->singleSet()['total'];
    }

    public function searchBookingByUser($id_user, $limit, $offset, $search) {
        $query = "SELECT DISTINCT b.id_booking, r.room_name, b.start_time, b.end_time,
                    b.total_person, b.status, b.created_at, f.rating
                FROM bookings b
                JOIN rooms r ON b.id_room = r.id_room
                LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
                LEFT JOIN feedback f ON b.id_booking = f.id_booking AND f.id_user = :id_user
                WHERE (b.id_user = :id_user OR bm.id_user = :id_user)
                AND (
                        r.room_name LIKE :search OR
                        b.status LIKE :search OR
                        b.start_time LIKE :search OR
                        b.end_time LIKE :search OR
                        b.total_person LIKE :search OR
                        DATE(b.start_time) LIKE :search
                )
                ORDER BY b.start_time DESC
                LIMIT :limit OFFSET :offset";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('search', "%$search%");
        $this->db->bind('limit', (int)$limit, PDO::PARAM_INT);
        $this->db->bind('offset', (int)$offset, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function countSearchBookingByUser($id_user, $search) {
        $query = "SELECT COUNT(DISTINCT b.id_booking) AS total
                FROM bookings b
                JOIN rooms r ON b.id_room = r.id_room
                LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
                WHERE (b.id_user = :id_user OR bm.id_user = :id_user)
                AND (
                        r.room_name LIKE :search OR
                        b.status LIKE :search OR
                        b.start_time LIKE :search OR
                        b.end_time LIKE :search OR
                        b.total_person LIKE :search OR
                        DATE(b.start_time) LIKE :search
                )";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('search', "%$search%");
        return $this->db->singleSet()['total'];
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

    //ini buat masukin anggota ke booking members
    public function insertBookingMember($id_booking, $id_user){
        $query = "INSERT INTO booking_members (id_booking, id_user)
                    VALUES (:id_booking, :id_user)";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_user', $id_user); 
        $this->db->execute();
        return $this->db->rowCount();
    }

    //ini buat ambil di reschedule
    public function getBookingMembers($id_booking){
    // Ambil NIM/NIP dan Nama dari tabel users lewat perantara booking_members
        $query = "SELECT u.id_user, u.username, u.nomor_induk
              FROM booking_members bm
              JOIN users u ON bm.id_user = u.id_user
              WHERE bm.id_booking = :id_booking";
              
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
    
        return $this->db->resultSet();
    }

    // ini dia cek apakah dia ada booking minggu ini
    public function checkUserQuota($id_user, $range_start, $range_end, $exclude_id = NULL){
        $sql = "SELECT 1
            FROM bookings b
            LEFT JOIN booking_members bm 
            ON bm.id_booking = b.id_booking
            WHERE (b.id_user = :uid OR bm.id_user = :uid)
                AND b.status IN ('pending', 'ongoing')
                AND (b.start_time < :range_end AND b.end_time > :range_start)";

            if ($exclude_id != NULL) {
            $sql .= " AND b.id_booking != :exclude_id";
            }

        $this->db->query($sql);
        $this->db->bind("uid", $id_user);
        $this->db->bind("range_start", $range_start);
        $this->db->bind("range_end", $range_end);  
            if ($exclude_id != NULL) {
            $this->db->bind("exclude_id", $exclude_id);
            } 

        return $this->db->singleSet() ? false : true;
    }


    //ini untuk reschedule dimana dia update total person dan juga schedulenya di tabel bookings
    public function updateScheduleAndTotalPerson($id_booking, $start, $end, $total){
        $query = "UPDATE bookings SET start_time = :start, end_time = :end, total_person = :total_person WHERE id_booking = :id_booking";
        $this->db->query($query);
        $this->db->bind('start', $start);
        $this->db->bind('end', $end);
        $this->db->bind('total_person', $total);
        $this->db->bind('id_booking', $id_booking);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function clearBookingMembers($id_booking) {
        $query = "DELETE FROM booking_members WHERE id_booking = :id";
        $this->db->query($query);
        $this->db->bind('id', $id_booking);
        $this->db->execute();
    }

    public function importMembersFromReschedule($id_booking, $id_reschedule) {
        $query = "INSERT INTO booking_members (id_booking, id_user)
                  SELECT :id_booking, id_user 
                  FROM reschedule_members 
                  WHERE id_reschedule = :id_res";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_res', $id_reschedule);
        $this->db->execute();
    }


    public function cancelBooking($id_booking){
        $query = "UPDATE bookings SET status = 'cancelled', cancel_by = 'user' WHERE id_booking = :id_booking";
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getBookingTodayJoinRoomAndUser() {
        $this->db->query("SELECT b.id_booking, u.username, b.start_time, b.end_time, b.booking_code, b.booker_name, b.status, r.room_name
                        FROM bookings b JOIN rooms r ON b.id_room = r.id_room
                        JOIN users u ON b.id_user = u.id_user
                        WHERE DATE(start_time) = CURDATE() ORDER BY start_time DESC");
        return $this->db->resultSet();
    }

    public function getBookingPendingjoinRoom() {
        $this->db->query("SELECT b.id_booking, u.username, b.start_time, b.end_time, b.booking_code, b.booker_name, b.status, r.room_name
                        FROM bookings b JOIN rooms r ON b.id_room = r.id_room
                        JOIN users u ON b.id_user = u.id_user
                        WHERE b.status = 'pending' ORDER BY start_time DESC");
        return $this->db->resultSet();
    }

    public function getBookingDoneAndCancelledjoinRoom() {
        $this->db->query("SELECT b.id_booking, u.username, b.start_time, b.end_time, b.booking_code, b.booker_name, b.status, r.room_name
                        FROM bookings b JOIN rooms r ON b.id_room = r.id_room
                        JOIN users u ON b.id_user = u.id_user
                        WHERE b.status IN ('done', 'cancelled') ORDER BY start_time DESC");
        return $this->db->resultSet();
    }

    public function getBookingByIdAndUser($id_booking, $id_user){
        // Ambil data booking DAN data ruangan sekaligus
        $query = "SELECT b.*, r.room_name, r.min_capacity, max_capacity, r.description, r.img_room, r.floor
              FROM bookings b
              JOIN rooms r ON b.id_room = r.id_room
              WHERE b.id_booking = :id_booking 
              AND b.id_user = :id_user";
              
        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_user', $id_user);
    
        return $this->db->singleSet();
    }

    public function isUserAssociatedWithBooking($id_booking, $id_user) {
        // Query untuk mengecek apakah user adalah PEMBUAT atau ANGGOTA dari booking tersebut
        $query = "SELECT b.id_booking 
                FROM bookings b
                LEFT JOIN booking_members bm ON b.id_booking = bm.id_booking
                WHERE b.id_booking = :id_booking 
                AND (b.id_user = :id_user OR bm.id_user = :id_user)
                LIMIT 1";

        $this->db->query($query);
        $this->db->bind('id_booking', $id_booking);
        $this->db->bind('id_user', $id_user);
        
        // Jika ada hasil, berarti user berhak. Jika false/kosong, berarti tidak berhak.
        return $this->db->singleSet(); 
    }

    

    public function autoCancelLateBookings()
    {
        
        $query = "UPDATE bookings b
                    LEFT JOIN reschedule r ON r.id_booking = b.id_booking
                    SET 
                        b.status = 'cancelled',
                        b.cancel_by = 'system',
                        r.cancel_by = 'system',
                        r.status_reschedule = CASE 
                            WHEN r.status_reschedule = 'pending' THEN 'cancelled'
                            ELSE r.status_reschedule
                        END
                    WHERE b.status = 'pending'
                    AND NOW() > DATE_ADD(b.start_time, INTERVAL 10 MINUTE);";
                  
        $this->db->query($query);
        $this->db->execute();
        
        // Mengembalikan jumlah baris yang di-update
        return $this->db->rowCount();
    }

    public function autoCompleteFinishedBookings()
    {
        //ini untuk mengubah status ke done saat dia masih ongoing
        $query = "UPDATE " . $this->table . " 
                  SET status = 'done' 
                  WHERE status = 'ongoing' 
                  AND NOW() > end_time";

        $this->db->query($query);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

}