<?php

class s_20251119_03_userSeeder extends Seeder{

    public function run()
    {
        $passwordUser = password_hash('user123', PASSWORD_DEFAULT);
        $passwordAdmin = password_hash('admin123', PASSWORD_DEFAULT);

        $sql = "
            INSERT IGNORE INTO users (
            id_role, username, password, email,
            nomor_induk, jurusan_unit, prodi,
            status, suspend_count, email_verified,
            reject_reason, profile_photo, kubaca_photo,
            expired_at, created_at, updated_at
            ) VALUES
            (1, 'superadmin', '$passwordAdmin', 'superadmin@example.com', '0001', 'Admin', 'NULL', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (2, 'admin', '$passwordAdmin', 'admin@example.com', '19877654', Admin, 'NULL', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (3, 'anton', '$passwordUser', 'anton@example.com', '22110033', 'TIK', 'Teknik Informatika dan Komputer', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (4, 'dosen', '$passwordUser', 'dosen@example.com', '55667788', 'Administrasi', 'Sekretariat', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (5, 'staff', '$passwordUser', 'staff@example.com', '55667789', 'Staff', 'Sekretariat', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
        ";

    $this->db->query($sql);
    $this->db->execute();
    }

}