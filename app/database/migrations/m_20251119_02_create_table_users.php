<?php


class m_20251119_create_table_users extends Migration{

    public function up()
    {
        $query = "CREATE TABLE users (
                id_user INT AUTO_INCREMENT PRIMARY KEY,
                id_role INT,
                username VARCHAR(255),
                password VARCHAR(255),
                email VARCHAR(255),
                nomor_induk VARCHAR(30),
                jurusan_unit VARCHAR(255),
                prodi VARCHAR(255),
                status ENUM('pending','rejected','active','deleted','cancelled') DEFAULT 'pending',
                suspend_count INT DEFAULT 0,
                email_verified BOOLEAN DEFAULT FALSE,
                reject_reason VARCHAR(255),
                profile_photo VARCHAR(255),
                kubaca_photo VARCHAR(255),
                expired_at DATETIME NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT fk_users_role FOREIGN KEY (id_role)
                REFERENCES roles(id_role)
                ON DELETE SET NULL ON UPDATE CASCADE
                );";

            $this->db->query($query);
            $this->db->execute();
    }
}