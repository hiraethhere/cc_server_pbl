<?php

class s_20251119_04_roomSeeder extends Seeder {

    public function run()
    {
        $sql = "INSERT INTO rooms (
            id_announcement, room_name, img_room,
            description, short_description, floor,
            status, min_capacity, max_capacity,
            created_at, updated_at
            ) VALUES
            (1, 'Ruang Rapat Utama', 'DefaultRuangan.jpg','Ruang besar untuk rapat tingkat institusi. Dilengkapi projector dan AC.','Ruang rapat besar', 1, 'active', 10, 30, NOW(), NOW()),
            (1, 'Ruang Dosen Lantai 2', 'DefaultRuangan.jpg','Ruang khusus dosen untuk diskusi internal dan bimbingan mahasiswa.', 'Ruang dosen', 2, 'active', 5, 15, NOW(), NOW()),
            (1, 'Ruang Seminar', 'DefaultRuangan.jpg','Ruang seminar untuk presentasi dan workshop kapasitas menengah.','Ruang seminar', 1, 'active', 20, 50, NOW(), NOW()),
            (NULL, 'Ruang Meeting Kecil', 'DefaultRuangan.jpg','Ruang kecil untuk rapat internal singkat.','Meeting kecil', 1, 'active', 4, 8, NOW(), NOW()),
            (NULL, 'Ruang Duta', 'DefaultRuangan.jpg','Ruangan besar khusus untuk para duta PNJ. Kapasitas hingga 10 orang.','Hidup Duta PNJ', 3, 'active', 5, 10, NOW(), NOW());
            ";
        $this->db->query($sql);
        $this->db->execute();
    }
}