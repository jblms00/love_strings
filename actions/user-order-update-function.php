<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$order_id   = $_POST['order_id'];
		$shipping_status = $_POST['shipping_status'];


		if (!empty($order_id) && !empty($shipping_status)) {
			$query = "UPDATE `purchased_products` SET `shipping_status`='Order Received' WHERE order_id = '$order_id'";
			mysqli_query($con, $query);

			header("Location: ../user-profile-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}