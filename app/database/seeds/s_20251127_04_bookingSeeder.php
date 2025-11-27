<?php

class s_20251127_04_bookingSeeder extends Seeder{
    public function run()
    {
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
            (3, 3, 8, 'Naqib Zuhair Al-Hudri', 4, NULL, '2024-12-03 13:00:00', '2024-12-03 15:00:00', 'BK003', 'active', NULL, NULL, NOW(), NOW()),
            (4, 1, 6, 'Shidqi Athallah Bahri', 3, NULL, '2024-12-10 10:00:00', '2024-12-10 13:00:00', 'BK001', 'cancelled', NULL, NULL, NOW(), NOW())
            ";
        $this->db->query($sql);
        $this->db->execute();
    }
}