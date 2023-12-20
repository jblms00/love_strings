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
		$user_email = $_POST['user_email'];
		$phone_number = $_POST['phone_number'];
		$user_address = $_POST['user_address'];

		$var_price = (double)filter_var($product_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

		$sql 			= "SELECT * FROM products WHERE product_name = '$product_name'";
		$sql_result 	= mysqli_query($con, $sql);

		while($row = mysqli_fetch_array($sql_result)){
			$current_stock = $row['product_stock'];
			$new_stock = $current_stock - $product_quantity;

			$update_stock_query = "UPDATE `products` SET `product_stock`= '$new_stock' WHERE product_name = '$product_name'";
			mysqli_query($con, $update_stock_query);
		}

		if (!empty($product_id) && !empty($product_image) && !empty($product_name) && !empty($product_price)) {
			
			$query = "INSERT INTO `purchased_products`(`user_id`, `product_id`, `product_image`, `product_name`, `product_type`, `product_price`, `product_quantity`, `user_email`, `phone_number`, `user_address`, `payment_method`, `shipping_status`)
                                                VALUES ('$user_id','$product_id','$product_image','$product_name','$product_type','$product_price','$product_quantity','$user_email','$phone_number','$user_address','Cash on Delivery','Pending')";
			mysqli_query($con, $query);

			header("Location: ../user-shop-page.php");
			die;
		}

		else {
            $message = "Please enter some information!";
		}
	}