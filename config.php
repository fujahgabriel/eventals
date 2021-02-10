<?php
session_start();
define ('ROOT_PATH', realpath(dirname(__FILE__)));
$BASE_URL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$BASE_URL .= "://".$_SERVER['HTTP_HOST'];
$BASE_URL .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASE_URL', $BASE_URL);
require_once ROOT_PATH . '/includes/auth.php';


function make_google_calendar_link($name, $begin, $end, $location, $details) {
	$params = array('&dates=', '/', '&details=', '&location=', '&sf=true&output=xml');
	$url = 'https://www.google.com/calendar/render?action=TEMPLATE&text=';
	$arg_list = func_get_args();
    for ($i = 0; $i < count($arg_list); $i++) {
    	$current = $arg_list[$i];
    	if(is_int($current)) {
    		$t = new DateTime('@' . $current, new DateTimeZone('UTC'));
    		$current = $t->format('Ymd\THis\Z');
    		unset($t);
    	}
    	else {
    		$current = urlencode($current);
    	}
    	$url .= (string) $current . $params[$i];
    }
    return $url;
}
?>