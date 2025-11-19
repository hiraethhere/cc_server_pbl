<?php

class s_20251119_01_roleSeeder extends Seeder {

    public function run()
    {
        $sql = "INSERT IGNORE INTO roles (id_role, role_name) VALUES
            (1, 'Superadmin'),
            (2, 'Admin'),
            (3, 'Mahasiswa'),
            (4, 'Dosen'),
            (5, 'Tendik');
        ";

        $this->db->query($sql);
        $this->db->execute();
    }
}