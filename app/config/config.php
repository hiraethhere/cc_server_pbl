<?php

$protocol = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https://' : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://');

// Gunakan fungsi pengecekan agar tidak terjadi error "already defined"
if (!defined('BASEURL')) {
    define('BASEURL', $protocol . $_SERVER['HTTP_HOST'] . '/');
}


define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASS', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_DATABASE']);

define('APP_NAME', 'RuanginPNJ');
define('APP_KEY', $_ENV['APP_KEY'] ?? 'Hello World1');

define('TURNSTILE_SITE_KEY', $_ENV['TURNSTILE_SITE_KEY'] ?? 'GANTI_DENGAN_SITE_KEY_ANDA_JIKA_TIDAK_PAKAI_ENV');
define('TURNSTILE_SECRET_KEY', $_ENV['TURNSTILE_SECRET_KEY'] ?? 'GANTI_DENGAN_SECRET_KEY_ANDA_JIKA_TIDAK_PAKAI_ENV');
date_default_timezone_set('Asia/Jakarta');
