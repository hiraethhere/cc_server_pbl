<?php

date_default_timezone_set('Asia/Jakarta');

class s_20251127_04_bookingSeeder extends Seeder{
    public function run()
    {

        $ongoing_start = date('Y-m-d H:i:s', strtotime('+1 hour')); 
        $ongoing_end   = date('Y-m-d H:i:s', strtotime('+2 hours'));

        $upcoming_start = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $upcoming_end   = date('Y-m-d H:i:s', strtotime('+5 hours'));

        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO bookings (id_booking,
            id_room, id_user, booker_name,
            total_person, institution_name,
            start_time, end_time,
            booking_code, status,
            reject_reason, cancel_by,
            created_at, updated_at
            ) VALUES
            (1, 1, 6, 'Shidqi Athallah Bahri', 3, NULL, '2024-12-01 10:00:00', '2024-12-01 13:00:00', 'BK001', 'done', NULL, NULL, NOW(), NOW()),
            (2, 2, 7, 'Nadiva Mecca Rimanda', 5, NULL, '2024-12-02 09:00:00', '2024-12-02 11:00:00', 'BK002', 'ongoing', NULL, NULL, NOW(), NOW()),
            (3, 3, 8, 'Naqib Zuhair Al-Hudri', 4, NULL, '2024-12-03 13:00:00', '2024-12-03 15:00:00', 'BK003', 'pending', NULL, NULL, NOW(), NOW()),
            (4, 1, 6, 'Shidqi Athallah Bahri', 3, NULL, '2024-12-10 10:00:00', '2024-12-10 13:00:00', 'BK001', 'cancelled', NULL, NULL, NOW(), NOW()),

            (5, 2, 6, 'Shidqi Athallah Bahri', 10, NULL, '$ongoing_start', '$ongoing_end', 'BK-NOW', 'ongoing', NULL, NULL, '$now', '$now'),

            (6, 3, 7, 'Nadiva Mecca Rimanda', 5, NULL, '$upcoming_start', '$upcoming_end', 'BK-NEXT', 'pending', NULL, NULL, '$now', '$now')
            ";
        $this->db->query($sql);
        $this->db->execute();
    }
}