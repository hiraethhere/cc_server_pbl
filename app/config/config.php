<?php

$base_url = $_ENV['BASE_URL'] ?? 'http://localhost:8082/';


define('BASEURL', $base_url);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASS', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_DATABASE']);

define('APP_NAME', 'RuangInPNJ');
date_default_timezone_set('Asia/Jakarta');
