<?php

/**
 * Define APP_ENV For Error Reporting
 * [ development | production ]
 */
define('APP_ENV', 'production');

if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require './vendor/autoload.php';
