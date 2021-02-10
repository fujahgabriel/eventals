<?php
include_once '../includes/database.php';
require_once ROOT_PATH . '/includes/authentication.php';
require_once ROOT_PATH . '/includes/events.php';

$database = new DB();
$db = $database->connect();

$auth = new Authentication($db);
$eventQuery = new Events($db);