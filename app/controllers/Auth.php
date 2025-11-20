<?php


class Auth extends Controller {

    public function index(){
        if(isset($_SESSION['user'])){
            header('location: /dashboard');
            exit;
        }
        unset($_SESSION['regisRole']);
        $this->view('Auth/login');
        $this->view('Layout/Footer');
    }

    // public function registerForm(){
    //     $this->view('Auth/register/index');
    //     $this->view('Layout/Footer');
    // }

    public function registerForms(){

        if(isset($_SESSION['user'])){
            header('location: /dashboard');
            exit;
        }

        if (isset($_POST['backToRole'])) {
            unset($_SESSION['regisRole']);
        }

        if (isset($_POST['role'])) {
            $_SESSION['regisRole'] = $_POST['role'];
        }

        $forms = $_SESSION['regisRole'] ?? null;

        switch ($forms) {
            case "3":
                $data['dataProdi'] = getProdi();
                $this->view('Auth/register/registerMahasiswa', $data);

                break;
            case "4":
                $this->view('Auth/register/registerDosen');

                break;
            case "5":
                $this->view('Auth/register/registerTendik');
        
                break;
            default:
                $this->view('Auth/register/index');
            
                break;
            }
            $this->view('Layout/Footer');
    }

    // public function 

    // public function registerMahasiswa(){
    //     $this->view('Auth/register/registerMahasiswa');
    //     $this->view('Layout/Footer');
    // }

    // public function registerDosen(){
    //     $this->view('Auth/register/registerDosen');
    //     $this->view('Layout/Footer');
    // }

    // public function registerTendik(){
    //     $this->view('Auth/register/registerTendik');
    //     $this->view('Layout/Footer');
    // }

    //belum bisa jangan dipake
    public function handleRegister(){
        try {

            if ($_POST['password'] != $_POST['confirmPassword']) {
                throw new Exception('Password tidak sama');
            }

            if ($_SESSION['regisRole'] === '3') {
                if (!validateEmail($_POST['email'])) {
                    throw new Exception('email tidak valid');
                }
                $expiredDate = countExpiredAt($_POST['email'], $_POST['prodi']);
            } else{
                $expiredDate = NULL;
            }

            if (isset($_FILES['buktiKubaca'])) {
                $buktiKubaca = uploadImage($_FILES['buktiKubaca'], 'storage/FotoBukti/');
            } else {
                throw new Exception('Mohon upload files');
            }

            $data = [
                'id_role' => $_SESSION['regisRole'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'nomor_induk' => $_POST['nomor_induk'],
                'email' => $_POST['email'],
                'jurusan_unit' => $_POST['jurusan_unit'],
                'prodi' => $_POST['prodi'] ?? NULL,
                'kubaca_photo' => $buktiKubaca ?? NULL,
                'profile_photo' => 'DefaultProfilePicture.jpg',
                'suspend_count' => 0,
                'email_verified' => true,
                'expired_at' => $expiredDate,
                'now' => date('Y-m-d H:i:s')
            ];

            if ($this->model('UserModel')->findUserByEmailorNomor_Induk($data['email'], $data['nomor_induk'])) {
                throw new Exception('Email atau NIM sudah terdaftar!');
            }
            

            $result = $this->model('UserModel')->createUser($data);
            if ($result <= 0) {
                throw new Exception('Something Went Wrong');
            }

            header('Location: /auth/pending');
            exit;

        } catch (\Exception $e ) {
            $error = $e->getMessage();
            Flasher::setFlash($error, 'Gagal Registrasi', 'danger');
            header('Location: /auth/registerForm');
            exit;
        }
    }

    public function handleLogin(){
        try{
            $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
            ];
        $user = $this->model('UserModel')->findUserAndRoleByEmail($data['email']);

        if (!$user) {
            throw new Exception('Email Salah');
        }

        if (!password_verify($data['password'], $user['password'])) {
            throw new Exception('Password Salah');
        }

        if ($user['status'] !== 'active') {
            throw new Exception('Akun anda belum AKtif!');
        }

        if ($user['suspend_count'] >= 3){
            throw new Exception('Akun anda sedang di suspend, silahkan hubungi admin!');
        }

        if ($user['expired_at'] !== null) {
            $now = new DateTime();
            $expired = new DateTime($user['expired_at']);

            if ($now > $expired) {
                throw new Exception('Akun anda sudah expired, silahkan hubungi admin');
            }
        }

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

        generateCsrf();

        Flasher::setFlash('Berhasil', 'login', 'success');
        if ($user['role'] === 'Admin') {
            header('location: /admin');
            exit;
        } else if ($user['role'] === 'Superadmin'){
            header('Location: /admin');
            exit;
        }
        else{
        header('location: /dashboard');
        }
        exit;
        } catch(\Exception $e) {
             Flasher::setFlash($e->getMessage(), 'Gagal login', 'danger');
            header('Location: /auth/formLogin');
            exit;
        }
    }

        public function forgetPassword(){

        if (isset($_POST['email'])) {
            $user = $this->model('userModel')->findUserByEmail($_POST['email']);

            if (!$user) {
            Flasher::setFlash('Email tidak terdaftar', 'Coba lagi', 'error');
            header('location: /auth/forgetPassword');
                exit;
            }

            $_SESSION['reset_email'] = $user['email'];
            $_SESSION['name'] = $user['username'];
            $_SESSION['otp'] = generateOTP();
            $_SESSION['otp_expire'] = time() + 600;

            try{
            sendEmail($_SESSION['reset_email'], $_SESSION['name'], 'hidup jokowi, ini otp lu', $_SESSION['otp']);
            header('location: /auth/verifyPassword');
            exit;   
            } catch(Exception $e){
            Flasher::setFlash($e->getMessage(), 'Gagal mengirim email', 'danger');
            header('Location: /auth/forgetPassword');
            exit;
            }
        }
        $this->view('Auth/forgetPassword');
        $this->view('Layout/Footer');
    }

    // ini buat lupa password ya bukan password biasa
    public function verifyPassword(){
        if (!isset($_SESSION['reset_email'])) {
            header('location: /auth/forgetPassword');
            exit;
        }
        if (isset($_POST['otp-1'])) {
            $otp =
                ($_POST['otp-1'] ?? '') .
                ($_POST['otp-2'] ?? '') .
                ($_POST['otp-3'] ?? '') .
                ($_POST['otp-4'] ?? '') .
                ($_POST['otp-5'] ?? '') . 
                ($_POST['otp-6'] ?? '');;

                if (time() > $_SESSION['otp_expire']) {
                    Flasher::setFlash('Kode OTP sudah kedaluwarsa', 'Silakan minta ulang', 'danger');
                    unset($_SESSION['reset_email'], $_SESSION['otp'], $_SESSION['otp_expire']);
                    header('Location: /auth/forgetPassword');
                    exit;
                }

                $sessionOTP = $_SESSION['otp'];
                if ($otp !== $sessionOTP) {
                Flasher::setFlash('OTP salah', 'Coba lagi', 'danger');
                header('Location: /auth/verifyPassword');
                exit;
            }
                    
                $_SESSION['reset_verified'] = true;

                unset($_SESSION['otp'], $_SESSION['otp_expire']);
                header('location: /auth/resetPassword');
                exit;

            
            header('location: /auth/resetPassword');
            exit;
        }

        $this->view('auth/verifyOTP');
    }

    public function resetPassword(){
       if (!isset($_SESSION['reset_verified'])) {
            Flasher::setFlash('Forbidden', 'Coba lagi', 'danger');
            header('location: /auth/verifyPassword');
            exit;
            }

        if (isset($_POST['passwordBaru'])) {
            if ($_POST['passwordBaru'] !== $_POST['password']) {
                Flasher::setFlash('Password tidak sama', 'Coba lagi', 'danger');
                header('location: /auth/resetPassword');
                exit;
            }

            $data = [
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'email' => $_SESSION['reset_email']
            ];
            $result = $this->model('userModel')->updatePassword($data);

            if ($result) {
            // hapus session reset
            unset($_SESSION['reset_email'], $_SESSION['reset_verified'], $_SESSION['otp']);
            Flasher::setFlash('Berhasil', 'Ubah password', 'success');
            header('location: /auth/');
            exit;
            }else {
                Flasher::setFlash('Gagal', "Ubah Password", "danger");
                header('location: /auth/resetPassword');
                exit;
            }
        }

        $this->view('auth/resetPassword');
    }

    public function handleLogout(){
        session_unset();
        session_destroy();
        header('location: /auth/formLogin');
        exit;
    }

    public function captchaImage(){
        // Pastikan token sudah ada di session (dibuat oleh formLogin/index)
        if (!isset($_SESSION['captcha_token'])) {
             // Buat gambar darurat jika token tidak ada
             $image = imagecreate(150, 50);
             $bgColor = imagecolorallocate($image, 255, 255, 255); // Putih
             $textColor = imagecolorallocate($image, 255, 0, 0); // Merah
             imagestring($image, 5, 10, 15, "ERROR", $textColor);
             header('Content-Type: image/png');
             imagepng($image);
             imagedestroy($image);
             exit;
        }

        $token = $_SESSION['captcha_token'];

        // 1. Buat kanvas gambar
        $image = imagecreate(150, 50); // Lebar 150, Tinggi 50

        // 2. Tentukan warna
        $bgColor = imagecolorallocate($image, 240, 240, 240); // Abu-abu muda
        $textColor = imagecolorallocate($image, 30, 30, 30); // Hitam/Abu tua
        $lineColor = imagecolorallocate($image, 200, 200, 200); // Garis acak

        // 3. (Opsional) Tambah garis-garis acak (noise)
        for ($i = 0; $i < 3; $i++) {
            imageline($image, 0, rand(0, 50), 150, rand(0, 50), $lineColor);
        }

        // 4. Tulis teks token ke gambar
        // (Kita pakai font bawaan PHP, angka 5 itu ukuran fontnya)
        imagestring($image, 5, 40, 15, $token, $textColor);

        // 5. Kirim gambar ke browser
        header('Content-Type: image/png');
        imagepng($image);

        // 6. Bersihkan memori
        imagedestroy($image);
        exit; // Penting, agar tidak ada output lain
    }

    public function pending(){
        $this->view('Auth/pending');
        $this->view('Layout/Footer');
    }
}