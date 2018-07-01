<?php

/*
 * Simple routing and settings.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ROOT', rtrim(dirname(__FILE__), '/'));

require_once 'autoloader.php';

$uri = filter_input(INPUT_SERVER, 'REQUEST_URI');

$file = ltrim($uri, '/');

if (is_dir($file)) {
    $file = rtrim($file, '/') . '/index.php';
}

$fileExt = pathinfo($file, PATHINFO_EXTENSION);

if (is_file($file) && $fileExt === 'php') {
    require_once $file;
} else {
    exit('Error 404');
}