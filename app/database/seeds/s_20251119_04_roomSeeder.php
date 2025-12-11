<?php

class s_20251119_04_roomSeeder extends Seeder {

    public function run()
    {
        $sql = "INSERT INTO rooms (id_room,
            id_announcement, room_name, img_room,
            description, short_description, floor,
            status, min_capacity, max_capacity,
            created_at, updated_at
            ) VALUES
            (1, 1, 'Galeri Literasi', 'GaleriLiterasi1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (2, 1, 'Lentera Edukasi', 'LenteraEdukasi1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (3, 1, 'Pusat Prancis', 'PusatPrancis1.webp','deskripsi ruangannn.','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (4, 1, 'Ruang Cendikia', 'RuangCendikia1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (5, 1, 'Ruang Rapat', 'RuangRapat1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (6, 1, 'Ruang Sinergi', 'RuangSinergi1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (7, 1, 'Sudut Pustaka', 'SudutPustaka1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (8, 1, 'Zona Interaktif', 'ZonaInteraktif1.webp','deskripsi ruangannn','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),

            (9, 1, 'Ruang Rapat Utama', 'DefaultRuangan.jpg','Ruang besar untuk rapat tingkat institusi. Dilengkapi projector dan AC.','Ruang rapat besar', 1, 'active', 2, 4, NOW(), NOW()),
            (10, NULL, 'Ruang Dosen Jurusan', 'DefaultRuangan.jpg','Ruang khusus dosen untuk diskusi internal dan bimbingan mahasiswa.', 'Ruang dosen', 2, 'active', 5, 7, NOW(), NOW()),
            (11, 1, 'Ruang Himpunan TIK', 'DefaultRuangan.jpg','Ruang Himpunan untuk presentasi dan workshop kapasitas menengah.','Ruang seminar', 1, 'active', 4, 6, NOW(), NOW()),
            (12, 1, 'Ruang Eksekutif Mahasiswa', 'DefaultRuangan.jpg','Ruang kecil untuk rapat Eksekutif Mahasiswa.','Hidup BEM PNJ, Hidup Perlawanan!', 1, 'active', 3, 5, NOW(), NOW()),
            (13, 1, 'Ruang Duta', 'DefaultRuangan.jpg','Ruangan besar khusus untuk para duta PNJ. Kapasitas hingga 6 orang.','Hidup Duta PNJ! Hidup Duta PNJ!', 3, 'active', 3, 6, NOW(), NOW()),
            (14, 1, 'Ruang Rapat', 'DefaultRuangan.jpg',NULL,'Ruang rapat yang hanya bisa dibooking oleh eksternal', 2, 'spesial', 10, 20, NOW(), NOW());
            ";
        $this->db->query($sql);
        $this->db->execute();
    }
}