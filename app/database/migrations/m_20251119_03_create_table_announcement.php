<?php

class m_20251119_03_create_table_announcement extends Migration{

    public function up()
    {
         $query = "CREATE TABLE IF NOT EXISTS announcement (
        id_announcement INT AUTO_INCREMENT PRIMARY KEY,
        announcement_name VARCHAR(255),
        announcement_content TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ";

        $this->db->query($query);
        $this->db->execute();
    }
}