<?php

include_once 'database.php';
include_once 'events.php';
include_once 'applications.php';

// get database connection
$database = new DB();
$db = $database->connect();

$eventQuery = new Events($db);

$apply = new Applications($db);
