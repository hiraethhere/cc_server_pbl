<?php

class m_20251119_08_create_table_violations extends Migration{

    public function up()
    {
        $query = "CREATE TABLE violations (
            id_violation INT AUTO_INCREMENT PRIMARY KEY,
            id_user INT NOT NULL,
            id_booking INT NOT NULL,
            violation_type ENUM('no-show', 'late') DEFAULT 'no-show',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            CONSTRAINT fk_violations_booking FOREIGN KEY (id_booking)
                REFERENCES bookings(id_booking)
                ON DELETE RESTRICT ON UPDATE CASCADE,
            CONSTRAINT fk_violations_user FOREIGN KEY (id_user)
                REFERENCES users(id_user)
                ON DELETE RESTRICT ON UPDATE CASCADE
            );";

        $this->db->query($query);
        $this->db->execute();
    }
}