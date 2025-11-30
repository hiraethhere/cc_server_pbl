<?php 

date_default_timezone_set('Asia/Jakarta');

require_once 'config/config.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Flasher.php';
require_once 'helper/uploadImages.php';
require_once 'helper/generateToken.php';
require_once 'helper/sendEmail.php';
require_once 'helper/validator.php';
require_once 'helper/prodi.php';
require_once 'helper/dateModifier.php';
require_once 'helper/translator.php';

if (!isset($_SESSION['user']) && isset($_COOKIE['ruangin_login'])) {
    
    // Pecah Cookie menjadi 3 bagian
    // Format Cookie: base64(email) : expired_time : signature
    $cookie_parts = explode(':', $_COOKIE['ruangin_login']);
    
    // Validasi format: Harus ada 3 bagian
    if (count($cookie_parts) === 3) {
        $encoded_email = $cookie_parts[0];
        $expired_time  = $cookie_parts[1];
        $signature_cookie = $cookie_parts[2];
        
        // Cek apakah cookie sudah kadaluwarsa?
        // Jika waktu sekarang (time()) lebih kecil dari waktu expired, berarti masih berlaku
        if (time() < $expired_time) {
            
            // Decode Email
            $email = base64_decode($encoded_email);
            
            // Hitung Ulang Signature (Validasi Keaslian)
            // Rumus harus SAMA PERSIS dengan saat membuat cookie di Auth.php
            $payload_to_verify = $email . '|' . $expired_time;
            $my_signature = hash_hmac('sha256', $payload_to_verify, APP_KEY);
            
            // andingkan Signature (Gunakan hash_equals untuk keamanan)
            if (hash_equals($my_signature, $signature_cookie)) {
                
                // SIGNATURE COCOK! Cookie Valid & Aman
                
                // Panggil Database untuk mengambil data user terbaru (Role, Nama, Foto, dll)
                // Kita perlu require Database wrapper karena ini di luar Controller
                require_once 'core/Database.php'; 
                $db = new Database();
                
                // Cari user berdasarkan EMAIL
                $db->query("SELECT u.id_user, u.username, u.email, u.jurusan_unit, u.prodi, u.profile_photo, u.status, u.nomor_induk, r.role_name as role
                             FROM users u  JOIN roles r ON u.id_role = r.id_role WHERE email = :email");
                $db->bind('email', $email);
                $user = $db->singleSet();

                // Jika user ditemukan dan statusnya aktif
                if ($user && $user['status'] === 'active') {
                    
                    // Set Session (Auto Login)
                    $_SESSION['user'] = [
                        'user_id' => $user['id_user'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'jurusan_unit' => $user['jurusan_unit'],
                        'prodi' => $user['prodi'],
                        'profile_photo' => $user['profile_photo'],
                        'nomor_induk' => $user['nomor_induk']
                    ];
                    $_SESSION['role'] = $user['role'];
                    
                }
            }
        } else {
            // Jika expired, hapus cookie sekalian biar bersih
            setcookie('ruangin_login', '', time() - 3600, '/');
        }
    }
}