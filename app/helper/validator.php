<?php
Flasher::ModalInfo();

function param_number($value, $errorMessage = "Parameter tidak valid")
{
    if ($value === null || !ctype_digit($value)) {
        return false;
    }
    return (int)$value;
}

function param_enum($value, $allowed, $errorMessage = "Parameter tidak valid")
{
    if (!in_array($value, $allowed)) {
        die($errorMessage);
    }
    return $value;
}

function validateCsrf($token){
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}

function validateEmail($email){
    $domainWajib = "@stu.pnj.ac.id";

        // cek domain
        if (!str_ends_with($email, $domainWajib)) {
            return false;
        }

        //ambil username sebelum @
        $username = substr($email, 0, strpos($email, '@'));

        //cek titik
        $parts = explode('.', $username);
        
        // titik count tidak boleh kurang dari 2
        if (count($parts) < 2) {
            return false; 
        }

        //cek bagian akhir
        $bagianAkhir = end($parts);

        //validasi panjang harus lebih dari 3
        if (strlen($bagianAkhir) < 3) {
            return false;
        }
        //tik24
        $duaDigitTahun = substr($bagianAkhir, -2);   //ambil "24"
        $kodeProdi = substr($bagianAkhir, 0, -2);    //ambil "tik"

        // Akhiran harus Angka DAN Depannya harus Huruf
        if (is_numeric($duaDigitTahun) && ctype_alpha($kodeProdi)) {
            return true;
        }
        
        return false;
    }

function validateEmailPHP($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

