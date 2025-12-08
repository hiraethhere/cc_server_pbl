<?php

class m_20251119_04_create_table_rooms extends Migration{

    public function up()
        {
            $query = "CREATE TABLE IF NOT EXISTS rooms (
                    id_room INT AUTO_INCREMENT PRIMARY KEY,
                    id_announcement INT,
                    room_name VARCHAR(255),
                    img_room VARCHAR(255),
                    description TEXT,
                    short_description VARCHAR(101),
                    floor TINYINT,
                    status ENUM('active', 'non-active', 'deleted', 'spesial') DEFAULT 'active',
                    min_capacity TINYINT,
                    max_capacity TINYINT,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                    CONSTRAINT fk_room_announcement 
                    FOREIGN KEY (id_announcement)
                    REFERENCES announcement(id_announcement)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE
                );";

        $this->db->query($query);
        $this->db->execute();
    }
}