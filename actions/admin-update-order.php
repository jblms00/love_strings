<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$order_id   		= $_POST['order_id'];
		$shipping_status 	= $_POST['shipping_status'];
		$receive_by_date 	= date_create($_POST['receive_by_date']);
		$date_format 		= date_format($receive_by_date,"D, F j, Y");

		if (!empty($order_id) && !empty($shipping_status)) {
			
			$query = "UPDATE `purchased_products` SET `shipping_status`='$shipping_status', `receive_by`='$date_format' WHERE order_id = '$order_id'";
			mysqli_query($con, $query);

			header("Location: ../admin-orders-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}