<?php

$base_url = $_ENV['BASE_URL'] ?? 'http://localhost:8082/';


define('BASEURL', $base_url);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASS', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_DATABASE']);

define('APP_NAME', 'RuanginPNJ');

define('TURNSTILE_SITE_KEY', $_ENV['TURNSTILE_SITE_KEY'] ?? 'GANTI_DENGAN_SITE_KEY_ANDA_JIKA_TIDAK_PAKAI_ENV');
define('TURNSTILE_SECRET_KEY', $_ENV['TURNSTILE_SECRET_KEY'] ?? 'GANTI_DENGAN_SECRET_KEY_ANDA_JIKA_TIDAK_PAKAI_ENV');
date_default_timezone_set('Asia/Jakarta');