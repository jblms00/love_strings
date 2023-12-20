<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$user_id= $_POST['user_id'];
		$product_id = $_POST['product_id'];
		$product_image = $_POST['product_image'];
		$product_name= $_POST['product_name'];
		$product_type = $_POST['product_type'];
		$product_price = $_POST['product_price'];
		$product_quantity = $_POST['product_quantity'];

		$new_price = $product_price * $product_quantity;

		$product_items = array();

		$var_price = (double)filter_var($new_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

		if (!empty($product_id) && !empty($product_image) && !empty($product_name) && !empty($product_price)) {
			
			$query = "INSERT INTO user_cart (user_id, product_id, product_image, product_name, product_type, product_price, product_quantity)
			VALUES ('$user_id', '$product_id', '$product_image', '$product_name', '$product_type','$var_price','$product_quantity')";
			mysqli_query($con, $query);

			header("Location: ../user-cart-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}