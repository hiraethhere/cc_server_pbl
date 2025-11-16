<?php

function generateCaptchaToken() {
    $pool = '23456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $token = '';
    for ($i = 0; $i < 5; $i++) {
        $token .= $pool[random_int(0, strlen($pool) - 1)];
    }
    $_SESSION['captcha_token'] = $token;
    return $token;
}

function generateCsrf(){
    if (session_status() === PHP_SESSION_NONE) session_start();

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_token(){
    return $_SESSION['csrf_token'];
}
