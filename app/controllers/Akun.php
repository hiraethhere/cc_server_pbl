<?php

class Akun extends Controller{

    public function __construct()
        {
            parent::__construct();
            if (!isset($_SESSION['user'])) {
            // Jika 'user_id' tidak ada di session (artinya belum login)
            Flasher::setModalInfo('kamu belum login', 'kamu belum login', 'error');
            header('Location: /auth/formLogin'); // Redirect ke halaman login
            exit; //Hentikan eksekusi script
            }

            $user = $this->model('UserModel')->getSuspendCount($_SESSION['user']['user_id']);

            if ($user >= 3) {
                session_destroy();
                header("Location: /auth/handleLogout");
                exit;
            }
        }

    public function index(){
            // 1. Tentukan judul halaman
        $data['judul'] = 'Profil Akun';
        $data['user'] = $_SESSION['user'];
        $data['suspend_count'] = $this->model('userModel')->getSuspendCount($_SESSION['user']['user_id']);
        $data['navbar'] = 'Akun';
        // 3. Panggil view (Urutan pemanggilan harus benar: Header, Body, Footer)
        $this->view('Layout/Header', $data);
        $this->view('anggota/Akun/index', $data); 
        $this->view('Layout/Footer');
    }

    public function gantiPassword(){
        $data['judul'] = 'Ganti Password';
        $data['navbar'] = 'Akun';
        $this->view('Layout/Header', $data);
        $this->view('anggota/akun/Ganti_Password', $data);
        $this->view('Layout/Footer');
    }

    public function hapusAkun(){
        $data['judul'] = 'Hapus Akun';
        $data['navbar'] = 'Akun';
        $this->view('Layout/Header', $data);
        $this->view('Akun/Hapus', $data);
        $this->view('Layout/Footer');
    }

    public function handlePasswordChange(){

        //ga boleh kosong
        if (empty($_POST['passwordBaru']) || empty($_POST['passwordLama'])) {
            Flasher::setModalInfo('Password tidak boleh kosong', 'Silahkan isi password', 'error');
            header('location: /akun/gantiPassword');
        }

        // kalo beda sama yang confirm maka salah
        if ($_POST['passwordBaru'] !== $_POST['passwordBaruConfirm']) {
            Flasher::setModalInfo('Password tidak sama', 'Silahkan isi password dengan benar', 'error');
            header('location: /akun/gantiPassword');
        }

        $oldPassword = $this->model('UserModel')->getPasswordByEmail($_SESSION['user']['email']);
        // var_dump($oldPassword);
        if (!$oldPassword) {
            Flasher::setModalInfo('Akun tidak ditemukan', 'Internal server error', 'error');
            header('location: /akun/gantiPassword');
        }

        if (!password_verify($_POST['passwordBaru'], $oldPassword['password'])) {
            Flasher::setModalInfo('Password lama salah', 'Silahkan masukan password yang benar', 'error');
            header('location: /akun/gantiPassword');
        }
        
        $data = [
            'password' => password_hash($_POST['passwordBaru'], PASSWORD_DEFAULT),
            'email' => $_SESSION['user']['email']
        ];
        $result = $this->model('UserModel')->updatePassword($data);

        if ($result === 0){
            Flasher::setModalInfo('Password sama dengan yang dulu', 'Gagal update atau Password sama', 'error');
            header('location: /akun/gantiPassword');
        }

        Flasher::setModalInfo('Berhasil mengubah Password', 'Password berhasil diubah', 'success', '/akun');
        // header('location: /a');


    }

    public function forgetPassword(){
        $this->view('Auth/forgetPassword');
    }

    public function updateProfilePhoto(){
        $id_user = $_SESSION['user']['user_id'] ?? null;
        if (!$id_user) {
            Flasher::setModalInfo('Gagal', 'User tidak ditemukan', 'error');
            header('Location: /akun');
            exit;
        }

        $selectedAvatar = $_POST['selected_avatar'] ?? '';
        $uploadedPath = '';

        // Handle file upload if provided
        if (isset($_FILES['profile_file']) && $_FILES['profile_file']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile_file'];
            $allowed = ['image/jpeg', 'image/png', 'image/webp'];
            if (!in_array($file['type'], $allowed)) {
                Flasher::setModalInfo('Format tidak didukung', 'Gunakan JPG, PNG, atau WEBP', 'error');
                header('Location: /akun');
                exit;
            }

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = 'profile_' . $id_user . '_' . time() . '.' . $ext;
            $targetDir = __DIR__ . '/../../public/img/profiles';
            if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
            $targetPath = $targetDir . '/' . $filename;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $uploadedPath = '/img/profiles/' . $filename;
            } else {
                Flasher::setModalInfo('Upload gagal', 'Terjadi masalah saat menyimpan file', 'error');
                header('Location: /akun');
                exit;
            }
        }

        $newProfile = '';
        if (!empty($uploadedPath)) {
            $newProfile = $uploadedPath;
        } elseif (!empty($selectedAvatar)) {
            $newProfile = $selectedAvatar; // expected to be path like /img/avatars/...
        } else {
            // user chose default/empty
            $newProfile = '';
        }

        $result = $this->model('UserModel')->updateProfilePhoto($id_user, $newProfile);
        if ($result >= 0) {
            // Update session so UI reflects change
            $_SESSION['user']['profile_photo'] = $newProfile;
            Flasher::setModalInfo('Berhasil', 'Foto profil berhasil diperbarui', 'success');
        } else {
            Flasher::setModalInfo('Gagal', 'Gagal memperbarui foto profil', 'error');
        }

        header('Location: /akun');
    }
}