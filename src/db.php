<?php

$host = "db";
$dbname = "php_docker";
$username = "php_docker";
$password = "password";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die ('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

return $mysqli;