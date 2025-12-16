<?php


class AdminModel {
    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAdmin($search = null){
        $query = "SELECT * FROM users u JOIN roles r ON u.id_role = r.id_role WHERE (r.role_name = 'Admin' OR r.role_name = 'Superadmin')";
        if ($search !== null) {
            $query .= " AND (u.username LIKE :search OR u.email LIKE :search OR u.nomor_induk LIKE :search)";
        }
        $this->db->query($query);
        if ($search !== null) {
            $this->db->bind(':search', "%$search%");
        }
        return $this->db->resultSet();
    }

    public function createAdmin($data){
        $query = "INSERT INTO users (username, email, password, nomor_induk, id_role, status) 
                  VALUES (:username, :email, :password, :nomor_induk, :id_role, :status)";
        $this->db->query($query);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':nomor_induk', $data['nomor_induk']);
        $this->db->bind(':id_role', $data['id_role']);
        $this->db->bind(':status', $data['status']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}