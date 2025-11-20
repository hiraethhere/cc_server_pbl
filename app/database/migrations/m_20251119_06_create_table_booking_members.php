<?php

class m_20251119_06_create_table_booking_members extends Migration{

    public function up()
    {
        $query = "CREATE TABLE booking_members (
                id_booking INT NOT NULL,
                id_user INT NOT NULL,
                PRIMARY KEY (id_booking, id_user),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT fk_booking FOREIGN KEY (id_booking)
                    REFERENCES bookings(id_booking)
                    ON DELETE RESTRICT ON UPDATE CASCADE,
                CONSTRAINT fk_user FOREIGN KEY (id_user)
                    REFERENCES users(id_user)
                    ON DELETE RESTRICT ON UPDATE CASCADE
            );";

        $this->db->query($query);
        $this->db->execute();
    }
}