<?php

class s_20251119_02_announcementSeeder extends Seeder {

    public function run()
    {
        // $passwordUser = password_hash('user123', PASSWORD_DEFAULT);
        // $passwordAdmin = password_hash('admin123', PASSWORD_DEFAULT);
        $sql = " INSERT IGNORE INTO announcement (announcement_name, announcement_content) VALUES 
                ('tata tertib', '1. Dilarang Merokok.\n 2. Dilarang Tidur.\n3. Dilarang Berisik.')";
    $this->db->query($sql);
    $this->db->execute();
    }
}