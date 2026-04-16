<?php

class Controller
{
    public function __construct() {
        //mulai sesi jika belum dimulai
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    // --- FUNGSI AJAIB: PENCARI FILE CASE-INSENSITIVE ---
    // Fungsi ini akan mencari file dengan mengabaikan huruf besar/kecil (Seperti Windows)
    private function resolveCaseInsensitivePath($basePath, $relativePath) {
        $parts = explode('/', $relativePath);
        $currentPath = rtrim($basePath, '/');

        foreach ($parts as $part) {
            $found = false;
            if (is_dir($currentPath)) {
                $files = scandir($currentPath);
                foreach ($files as $file) {
                    // Cek apakah namanya sama jika semuanya dikecilkan
                    if (strtolower($file) === strtolower($part)) {
                        $currentPath .= '/' . $file;
                        $found = true;
                        break;
                    }
                }
            }
            // Jika tidak ketemu, gunakan nama aslinya
            if (!$found) {
                $currentPath .= '/' . $part;
            }
        }
        return $currentPath;
    }

    public function view($view, $data = []) {
        extract($data);
        
        // Gunakan pencari file cerdas
        $viewFile = $this->resolveCaseInsensitivePath('../app/view', $view . '.php');
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die('Error file tidak ditemukan: ' . $viewFile);
        }
    }

    public function model($model){
        
        // Gunakan pencari file cerdas
        $modelFile = $this->resolveCaseInsensitivePath('../app/model', $model . '.php');
        
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model;
        } else {
            die('error model tidak ditemukan: ' . $modelFile);
        }
    }

    public function preventCache() {
        // header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        // header("Cache-Control: post-check=0, pre-check=0", false);
        // header("Pragma: no-cache");
        // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Tanggal di masa lalu
    }
}
