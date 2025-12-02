<?php

class s_20251119_03_userSeeder extends Seeder{

    public function run()
    {
        $passwordUser = password_hash('user123', PASSWORD_DEFAULT);
        $passwordAdmin = password_hash('admin123', PASSWORD_DEFAULT);
        $expired = date('Y-m-d H:i:s', strtotime("-1 years"));
        $expired4Years = date('Y-m-d H:i:s', strtotime("+4 years"));
        $expired3Years = date('Y-m-d H:i:s', strtotime("+3 years"));

        $sql = "INSERT IGNORE INTO users ( id_user,
            id_role, username, password, email,
            nomor_induk, jurusan_unit, prodi,
            status, suspend_count, email_verified,
            reject_reason, profile_photo, kubaca_photo,
            expired_at, created_at, updated_at
            ) VALUES
            (1, 1, 'superadmin', '$passwordAdmin', 'superadmin@example.com', '0001', 'Admin', NULL, 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (2, 2, 'admin', '$passwordAdmin', 'admin@example.com', '19877654', 'Admin', NULL, 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (3, 3, 'Anton Subanton', '$passwordUser', 'anton@example.com', '22110033', 'TIK', 'Teknik Informatika dan Komputer', 'active', 0, 1, NULL, NULL, NULL, '$expired4Years', NOW(), NOW()),
            (4, 4, 'dosen', '$passwordUser', 'dosen@example.com', '55667788', 'Administrasi', 'Sekretariat', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (5, 5, 'staff', '$passwordUser', 'staff@example.com', '55667789', 'Staff', 'Sekretariat', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (6, 3, 'Shidqi Athallah Bahri', '$passwordUser', 'shidqi.tik24@stu.pnj.ac.id', '2407411038', 'TIK', 'D4 Teknik Informatika', 'active', 0, 1, NULL, NULL, NULL, NULL , NOW(), NOW()),
            (7, 4, 'Nadiva Mecca Rimanda', '$passwordUser', 'mecca.tik24@stu.pnj.ac.id', '2407411037', 'TIK', NULL, 'active', 0, 1, NULL, NULL, NULL, NULL , NOW(), NOW()),
            (8, 5, 'Naqib Zuhair Al-Hudri', '$passwordUser', 'naqib.tik24@stu.pnj.ac.id', '2407411039', 'Perpustakaan', NULL, 'active', 0, 1, NULL, NULL, NULL, NULL , NOW(), NOW()),
            (9, 3, 'antin', '$passwordUser', 'expired@example.com', '556677891', 'TIK', 'Teknik Multimedia', 'active', 0, 1, NULL, NULL, NULL, '$expired' , NOW(), NOW()),
            (10, 3, 'Lebron James', '$passwordUser', 'lebron.tik24@stu.pnj.ac.id', '2407411045', 'Teknik NBA', 'D4 Teknik Yapping', 'pending', 0, 1, NULL, NULL, NULL, '$expired4Years', NOW(), NOW()),
            (11, 4, 'Naufal Bryant', '$passwordUser', 'naufal.tik24@stu.pnj.ac.id', '2407411046', 'Teknik At-Taufiq', NULL, 'pending', 0, 1, NULL, NULL, NULL, '$expired4Years', NOW(), NOW()),
            (12, 3, 'Sulthon Fabian', '$passwordUser', 'sulthon.tik24@stu.pnj.ac.id', '2407411047', 'TIK', 'D4 Teknik Informatika', 'active', 0, 1, NULL, NULL, NULL, '$expired4Years', NOW(), NOW()),
            (13, 3, 'Fadhil Ramadhan', '$passwordUser', 'fadhil.tik24@stu.pnj.ac.id', '2407411048', 'Teknik Elektro', 'D3 Listrik Kantor', 'active', 0, 1, NULL, NULL, NULL, '$expired3Years', NOW(), NOW()),
            (14, 4, 'Sabrina Aulia', '$passwordUser', 'sabrina.sekret@pnj.ac.id', '2407411049', 'Administrasi', 'Sekretariat', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (15, 5, 'Dimas Pranata', '$passwordUser', 'dimas.staff@pnj.ac.id', '2407411050', 'Staff', 'Perpustakaan', 'active', 0, 1, NULL, NULL, NULL, NULL, NOW(), NOW()),
            (16, 3, 'Farhan Rizky Mahendra', '$passwordUser', 'farhan.tik24@stu.pnj.ac.id', '2407411051', 'TIK', 'Teknik Informatika dan Komputer', 'active', 0, 1, NULL, NULL, NULL, '$expired4Years', NOW(), NOW())

            ";

    $this->db->query($sql);
    $this->db->execute();
    }

}