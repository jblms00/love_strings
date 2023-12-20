<?php

// Function to connect to database
// PHP by default
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
// Your database name in phpmyadmin
$dbname = "lovestrings_db";

// If statement to connect to phpmyadmin
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {
	die("failed to connect!");
}
	
?>