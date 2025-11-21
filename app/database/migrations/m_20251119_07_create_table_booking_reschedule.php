<?php

class m_20251119_07_create_table_booking_reschedule extends Migration{

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS booking_reschedule (
                id_reschedule INT AUTO_INCREMENT PRIMARY KEY,
                id_booking INT NOT NULL,
                reschedule_reason VARCHAR(255),
                cancel_reason VARCHAR(255),
                status_reschedule ENUM('pending','approved','declined') DEFAULT 'pending',
                cancel_by ENUM('user','system','admin') NULL,
                new_start_time DATETIME,
                new_end_time DATETIME,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT fk_reschedule_booking FOREIGN KEY (id_booking)
                    REFERENCES bookings(id_booking)
                    ON DELETE RESTRICT ON UPDATE CASCADE
            );";

        $this->db->query($query);
        $this->db->execute();
    }
}