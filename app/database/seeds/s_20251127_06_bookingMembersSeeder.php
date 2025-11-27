<?php

class s_20251127_06_bookingMembersSeeder extends Seeder {
    public function run() {
        $query = "INSERT INTO booking_members (id_booking, id_user, created_at, updated_at) VALUES
                  (1, 4, NOW(), NOW()),
                  (1, 3, NOW(), NOW()),
                  (1, 7, NOW(), NOW()),
                  (2, 4, NOW(), NOW()),
                  (2, 5, NOW(), NOW()),
                  (3, 5, NOW(), NOW()),
                  (3, 6, NOW(), NOW());";

        $this->db->query($query);
        $this->db->execute();
    }
}