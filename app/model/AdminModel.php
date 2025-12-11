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


}