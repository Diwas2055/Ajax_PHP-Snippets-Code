<?php
	$conn = new mysqli('localhost', 'root', '', 'db_save');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>