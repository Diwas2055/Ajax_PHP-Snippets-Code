<?php

$host = "localhost";
$user = "postgres";
$password = "root";
$dbname = "postgres";
$con = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$con) {

	die('Connection failed.');

}