<?php


class AdminModel {
    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAdmin( $limit = 10, $offset = 0, $search = null )
    {
        $query = "SELECT *
            FROM users u
            JOIN roles r ON u.id_role = r.id_role
            WHERE (r.role_name = 'Admin' OR r.role_name = 'Superadmin')
        ";

        if ($search !== null && $search !== '') {
            $query .= "
                AND (
                    u.username LIKE :search
                    OR u.email LIKE :search
                    OR u.nomor_induk LIKE :search
                )
            ";
        }

        $query .= " ORDER BY u.id_user DESC LIMIT :limit OFFSET :offset";

        $this->db->query($query);

        if ($search !== null && $search !== '') {
            $this->db->bind('search', "%$search%");
        }

        // LIMIT & OFFSET HARUS INTEGER
        $this->db->bind('limit', (int)$limit);
        $this->db->bind('offset', (int)$offset);

        return $this->db->resultSet();
    }

    public function countAdmin($search = null)
    {
        $query = "
            SELECT COUNT(*) as total
            FROM users u
            JOIN roles r ON u.id_role = r.id_role
            WHERE (r.role_name = 'Admin' OR r.role_name = 'Superadmin')
        ";

        if ($search !== null && $search !== '') {
            $query .= "
                AND (
                    u.username LIKE :search
                    OR u.email LIKE :search
                    OR u.nomor_induk LIKE :search
                )
            ";
        }

        $this->db->query($query);

        if ($search !== null && $search !== '') {
            $this->db->bind('search', "%$search%");
        }

        return $this->db->singleSet()['total'];
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