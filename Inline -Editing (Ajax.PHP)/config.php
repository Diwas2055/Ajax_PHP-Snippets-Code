<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "tutorial"; /* Database name */

// Mysql
$mysql_con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$mysql_con) {
 	die("Connection failed: " . mysqli_connect_error());
}

// PostgreSQL
$postgres_con = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$postgres_con) {

	die('Connection failed.');

}

if ($mysql_con)
{
	$con=$mysql_con;
}
else if ($postgres_con)
{
	$con=$postgres_con;
}
else{
	die("No connection");
}