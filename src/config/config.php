<?php

define('DB_SERVER', '185.208.164.127');
define('DB_USERNAME', 'sancrow_root');
define('DB_PASSWORD', '1Ketiow1');
define('DB_NAME', 'sancrow_prodyct-catalog');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
