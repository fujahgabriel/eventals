<?php
session_start();
//error_reporting(0);
define ('ROOT_PATH', realpath(dirname(__FILE__)));
$BASE_URL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$BASE_URL .= "://".$_SERVER['HTTP_HOST'];
$BASE_URL .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASE_URL', $BASE_URL);
require_once ROOT_PATH . '/includes/db.php';
