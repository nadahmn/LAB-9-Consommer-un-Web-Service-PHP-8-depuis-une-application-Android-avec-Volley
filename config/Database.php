<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'school1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

function debug($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function logError($message) {
    $logFile = __DIR__ . '/../logs/error.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}
