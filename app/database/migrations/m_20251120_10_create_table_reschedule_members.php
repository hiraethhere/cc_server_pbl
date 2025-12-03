<?php

class m_20251120_10_create_table_reschedule_members extends Migration{

    public function up()
    {
        $query = "CREATE TABLE reschedule_members (
                id_reschedule INT NOT NULL,
                id_user INT NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                PRIMARY KEY (id_reschedule, id_user),

                CONSTRAINT fk_members_reschedule 
                FOREIGN KEY (id_reschedule) REFERENCES reschedule(id_reschedule) 
                ON UPDATE RESTRICT ON DELETE RESTRICT,

                CONSTRAINT fk_members_user 
                FOREIGN KEY (id_user) REFERENCES users(id_user) 
                ON UPDATE RESTRICT ON DELETE RESTRICT);";

        $this->db->query($query);
        $this->db->execute();
    }
}