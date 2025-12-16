<?php

date_default_timezone_set('Asia/Jakarta');

class s_20251127_04_bookingSeeder extends Seeder{
    public function run()
    {

        $ongoing_start = date('Y-m-d H:i:s', strtotime('+1 hour')); 
        $ongoing_end   = date('Y-m-d H:i:s', strtotime('+2 hours'));

        $start_now = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $end_now = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        $upcoming_start = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $upcoming_end   = date('Y-m-d H:i:s', strtotime('+5 hours'));

        $upcoming_20min_start = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        $ending_10min_end = date('Y-m-d H:i:s', strtotime('+20 minutes'));

        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO bookings (id_booking,
            id_room, id_user,
            total_person, institution_name,
            start_time, end_time,
            booking_code, status,
            reject_reason, cancel_by,
            created_at, updated_at
            ) VALUES
            (1, 1, 6, 3, NULL, '2024-12-01 10:00:00', '2024-12-01 13:00:00', 'UJ934TG', 'done', NULL, NULL, NOW(), NOW()),
            (2, 2, 7, 5, NULL, '2024-12-02 09:00:00', '2024-12-02 11:00:00', 'BK002', 'ongoing', NULL, NULL, NOW(), NOW()),
            (3, 3, 8,  4, NULL, '2024-12-03 13:00:00', '2024-12-03 15:00:00', 'BK003', 'pending', NULL, NULL, NOW(), NOW()),
            (5, 1, 6, 3, NULL, '2024-12-03 10:00:00', '2024-12-10 13:00:00', 'BK001', 'cancelled', NULL, NULL, NOW(), NOW()),
            (4, 2, 6,  10, NULL, '$ongoing_start', '$ongoing_end', 'BK-NOW', 'pending', NULL, NULL, '$now', '$now'),
            (6, 3, 7, 5, NULL, '$upcoming_20min_start', '$upcoming_end', 'BK-NEXT', 'pending', NULL, NULL, '$now', '$now'),
            (7, 1, 8, 4, NULL, '$upcoming_20min_start', '$upcoming_end', 'DUTAPNJ', 'pending', NULL, NULL, NOW(), NOW()),
            (8, 1, 6,  4, NULL, '$start_now', '$ending_10min_end', 'DNIWW987', 'cancelled', NULL, NULL, NOW(), NOW()),
            (9, 2, 6,  5, NULL, '2025-01-15 14:00:00', '2025-01-15 17:00:00', 'BK1002', 'done', NULL, NULL, NOW(), NOW()),
            (10, 3, 6,  3, NULL, '2025-01-29 09:00:00', '2025-01-29 11:00:00', 'BK1003', 'done', NULL, NULL, NOW(), NOW()),
            (11, 1, 6,  6, NULL, '2025-02-12 13:00:00', '2025-02-12 16:00:00', 'BK1004', 'cancelled', NULL, NULL, NOW(), NOW()),
            (12, 2, 6,  4, NULL, '2025-02-26 08:00:00', '2025-02-26 10:00:00', 'BK1005', 'done', NULL, NULL, NOW(), NOW()),
            (13, 3, 6,  8, NULL, '2025-03-12 11:00:00', '2025-03-12 13:00:00', 'BK1006', 'done', NULL, NULL, NOW(), NOW()),
            (14, 1, 6,  3, NULL, '2025-03-26 15:00:00', '2025-03-26 18:00:00', 'BK1007', 'done', NULL, NULL, NOW(), NOW()),
            (15, 2, 6,  7, NULL, '2025-04-09 10:00:00', '2025-04-09 12:00:00', 'BK1008', 'done', NULL, NULL, NOW(), NOW()),
            (16, 3, 6,  4, NULL, '2025-04-23 09:00:00', '2025-04-23 11:00:00', 'BK1009', 'done', NULL, NULL, NOW(), NOW()),
            (17, 1, 6, 5, NULL, '2025-05-07 14:00:00', '2025-05-07 17:00:00', 'BK1010', 'done', NULL, NULL, NOW(), NOW())
            ";
        $this->db->query($sql);
        $this->db->execute();
    }
}