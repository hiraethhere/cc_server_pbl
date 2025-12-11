<?php


class AdminModel {
    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAdmin(){
        $this->db->query("SELECT * FROM users u JOIN roles r ON u.id_role = r.id_role WHERE r.role_name = 'Admin' OR r.role_name = 'Superadmin'");
        return $this->db->resultSet();
    }

}