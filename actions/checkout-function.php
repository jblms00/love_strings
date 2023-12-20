<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$user_id= $_POST['user_id'];
		$product_price = $_POST['product_price'];
		$product_quantity = $_POST['product_quantity'];
		$user_notes = $_POST['user_notes'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$phone_number = $_POST['phone_number'];
		$user_address = $_POST['user_address'];

		$sql 			= "SELECT * FROM products WHERE product_name = '$product_name'";
		$sql_result 	= mysqli_query($con, $sql);

		while($row = mysqli_fetch_array($sql_result)){
			$current_stock = $row['product_stock'];
			$new_stock = $current_stock - $product_quantity;

			$update_stock_query = "UPDATE `products` SET `product_stock`= '$new_stock' WHERE product_name = '$product_name'";
			mysqli_query($con, $update_stock_query);
		}

		if (!empty($user_id) && !empty($user_name) && !empty($user_email) && !empty($product_price)) {
			
			$query = "INSERT INTO `purchased_products`(`user_id`, `product_name`, `product_type`, `product_price`, `product_quantity`, `user_notes`, `user_name`, `user_email`, `phone_number`, `user_address`, `payment_method`, `shipping_status`) VALUES ('$user_id', 'Multiple Item', 'Multiple Products','$product_price','$product_quantity', '$user_notes', '$user_name', '$user_email','$phone_number','$user_address','Cash on Delivery','Pending')";

			if (mysqli_query($con, $query)) {
				$query = "DELETE FROM `user_cart` WHERE `user_id` = '$user_id'";
				mysqli_query($con, $query) or die(mysqli_error());

				header("Location: ../user-profile-page.php");
				die;
			}
		}

		else {
            $message = "Please enter some information!";
		}
	}