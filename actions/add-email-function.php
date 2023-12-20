<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$user_id = $_POST['user_id'];
		$user_email = $_POST['user_email'];

		if (!empty($user_id) && !empty($user_email)) {
			
			$query = "INSERT INTO users_emails (`user_id`, `user_email`) VALUES ('$user_id','$user_email')";
			mysqli_query($con, $query);

			header("Location: ../user-index-page.php");
			die;
		}

		else {
            $message = "ERROR 404";
			die;
		}
	}