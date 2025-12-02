<?php 

class UserModel {

    private $table = 'users';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUserById($id){
        $this->db->query("SELECT * FROM users WHERE id_user = :id_user limit 1");
        $this->db->bind(':id_user', $id);
        return $this->db->singleSet();
    }

    public function getUserByNomor_Induk($nomor_induk){
        $this->db->query("SELECT * FROM users WHERE nomor_induk = :nomor_induk AND id_role in (4, 5, 3)  limit 1");
        $this->db->bind(':nomor_induk', $nomor_induk, PDO::PARAM_STR);
        return $this->db->singleSet();
    }

    public function getUserByNomor_IndukActive($nomor_induk){
        $this->db->query("SELECT * FROM users WHERE nomor_induk = :nomor_induk AND id_role IN (4, 5, 3) AND status = 'active' limit 1");
        $this->db->bind(':nomor_induk', $nomor_induk, PDO::PARAM_STR);
        return $this->db->singleSet();
    }

    public function getPasswordByEmail($email){
        $this->db->query("SELECT password FROM  users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->singleSet();
    }

    public function findUserByEmail($email){
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    return $this->db->singleSet();
    }

    public function findUserByEmailOrNomor_Induk($email, $nomor_induk){
    $this->db->query("SELECT * FROM users WHERE email = :email OR nomor_induk = :nomor_induk");
    $this->db->bind(':email', $email);
    $this->db->bind(':nomor_induk', $nomor_induk);
    return $this->db->singleSet();
    }

    public function loginUserByEmailorNomor_Induk($input){
        $this->db->query("SELECT * FROM users WHERE email = :input or nomor_induk = :input LIMIT 1");
        $this->db->bind(':input', $input);
        return $this->db->singleSet();
    }

    public function findUserAndRoleByEmail($email){
        $this->db->query("SELECT u.*, r.role_name AS role FROM users u JOIN roles r ON u.id_role = r.id_role WHERE email = :email LIMIT 1 ");
        $this->db->bind(':email', $email);
        return $this->db->singleSet();
    }

    public function getRole($id_role){
        $this->db->query("SELECT role_name AS role FROM roles where id_role = :id_role LIMIT 1" );
        $this->db->bind(':id_role', $id_role);
        return $this->db->singleSet();  
    }

    public function getUserForAdmin(){
        $this->db->query("SELECT u.id_user, u.status , u.username,r.role_name, u.nomor_induk, u.jurusan_unit, u.created_at 
                        FROM users u JOIN roles r ON u.id_role = r.id_role WHERE u.id_role NOT IN (1,2) AND status = 'pending'" );
        return $this->db->resultSet();
    }

    public function createUser($data){
        $this->db->query(
            "INSERT INTO users (id_role, username, nomor_induk, email, password, jurusan_unit, prodi, status, suspend_count, email_verified, kubaca_photo, profile_photo, expired_at, created_at) 
            VALUES (:id_role, :username, :nomor_induk, :email, :password, :jurusan_unit, :prodi, :status, :suspend_count, :email_verified, :kubaca_photo, :profile_photo, :expired_at, :now)"
        );

        $this->db->bind('id_role', $data['id_role']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nomor_induk', $data['nomor_induk']);
        $this->db->bind(':jurusan_unit', $data['jurusan_unit']);
        $this->db->bind(':prodi', $data['prodi']);
        $this->db->bind(':status', $data['status'] );
        $this->db->bind('suspend_count', $data['suspend_count']);
        $this->db->bind(':email_verified', $data['email_verified']);
        $this->db->bind(':kubaca_photo', $data['kubaca_photo']);
        $this->db->bind(':profile_photo', $data['profile_photo']);
        $this->db->bind(':expired_at', $data['expired_at']);
        $this->db->bind(':now', $data['now']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePassword($data){
        $this->db->query("UPDATE users SET password = :password WHERE email = :email");
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute(); 
    
        return $this->db->rowCount(); 
    }

    public function addSuspendCount($id_user){
        $this->db->query("UPDATE users SET suspend_count = suspend_count + 1 WHERE id_user = :id_user");
        $this->db->bind(':id_user',$id_user);
        $this->db->execute(); 
    
        return $this->db->rowCount(); 
    }

    public function getPendingUser(){
        $this->db->query("SELECT * FROM users WHERE status = 'pending' AND id_role NOT IN (1,2)" );
        return $this->db->resultSet();
    }

    public function rejectUser($id_user, $reason = null){
        $this->db->query("UPDATE users SET status = 'rejected', reject_reason = :reason WHERE id_user = :id_user");
        $this->db->bind('reason', $reason);
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function activateUser($id_user){
        $this->db->query("UPDATE users SET status = 'active' WHERE id_user = :id_user");
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserJoinRoleById($id_user){
        $this->db->query("SELECT u.*, r.role_name 
                          FROM users u 
                          JOIN roles r ON u.id_role = r.id_role 
                          WHERE u.id_user = :id_user LIMIT 1");
        $this->db->bind(':id_user', $id_user);
        return $this->db->singleSet();
    }

    public function getUserForAdminPaginated($limit, $start){
        $query = "SELECT u.id_user, u.username, r.role_name, u.nomor_induk, u.status, u.jurusan_unit, u.created_at 
                  FROM users u 
                  JOIN roles r ON u.id_role = r.id_role 
                  WHERE u.id_role NOT IN (1,2) 
                  AND u.status = 'pending'
                  ORDER BY u.created_at ASC 
                  LIMIT :limit OFFSET :start";
        
        $this->db->query($query);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':start', $start);
        
        return $this->db->resultSet();
    }

    public function getAllUsersPaginated($limit, $start){
        $query = "SELECT u.*, r.role_name 
                  FROM users u
                  JOIN roles r ON u.id_role = r.id_role 
                  WHERE u.id_role NOT IN (1, 2) 
                  ORDER BY u.created_at DESC 
                  LIMIT :limit OFFSET :start";
        
        $this->db->query($query);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':start', $start);
        
        return $this->db->resultSet();
    }

    public function countAllUsers()
    {
        // Tidak perlu JOIN untuk hitung total, cukup filter tabel users saja biar cepat
        $query = "SELECT COUNT(*) as total 
                  FROM users 
                  WHERE id_role NOT IN (1,2)";
                  
        $this->db->query($query);
        return $this->db->singleSet();
    }

    public function countPendingUsers(){
        // Tidak perlu JOIN untuk hitung total, cukup filter tabel users saja biar cepat
        $query = "SELECT COUNT(*) as total 
                  FROM users 
                  WHERE id_role NOT IN (1,2) 
                  AND status = 'pending'";
                  
        $this->db->query($query);
        return $this->db->singleSet();
    }

    public function autoDeactivateExpiredUsers(){
        // Ubah status jadi 'rejected' atau 'deleted' jika waktu sekarang melewati expired_at
        // dan statusnya masih aktif/pending
        $query = "UPDATE users 
                  SET status = 'rejected', reject_reason = 'Account Expired (System Auto)'
                  WHERE expired_at IS NOT NULL 
                  AND NOW() > expired_at 
                  AND status IN ('active', 'pending')";

        $this->db->query($query);
        $this->db->execute();
        
        return $this->db->rowCount();   
    }
}