<?php

class s_20251119_01_roleSeeder extends Seeder {

    public function run()
    {
        $sql = "INSERT IGNORE INTO roles (role_name) VALUES
            ('Superadmin'),
            ('Admin'),
            ('Mahasiswa'),
            ('Dosen'),
            ('Tendik');
        ";

        $this->db->query($sql);
        $this->db->execute();
    }
}