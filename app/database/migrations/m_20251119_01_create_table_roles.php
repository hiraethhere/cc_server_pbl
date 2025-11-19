<?php

class m_20251119_create_table_roles extends Migration{

    public function up(){

        $query = "CREATE TABLE roles (
        id_role INT AUTO_INCREMENT PRIMARY KEY,
        role_name VARCHAR(255),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ";

        $this->db->query($query);
        $this->db->execute();
    }
}