<?php

class m_20251119_09_create_table_feedbacks extends Migration{
    public function up()
    {
        $query = "CREATE TABLE feedback (
        id_feedback INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT NOT NULL,
        id_booking INT NOT NULL,
        rating TINYINT,
        comment TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        CONSTRAINT fk_feedback_booking FOREIGN KEY (id_booking)
            REFERENCES bookings(id_booking)
        ON DELETE RESTRICT ON UPDATE CASCADE,
        CONSTRAINT fk_feedback_user FOREIGN KEY (id_user)
            REFERENCES users(id_user)
        ON DELETE RESTRICT ON UPDATE CASCADE
        ) ";

        $this->db->query($query);
        $this->db->execute();
    }
}