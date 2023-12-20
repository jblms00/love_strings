<?php 
session_start();

	include("database-connect.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//if data is entered..
		$product_id = $_POST['product_id'];
		$product_stock = $_POST['product_stock'];
		$new_stock = $product_stock + 50;

		if (!empty($product_id) && !empty($product_stock)) {
			
			$query = "UPDATE `products` SET `product_stock` = '$new_stock' WHERE product_id = '$product_id'";
			mysqli_query($con, $query);

			header("Location: ../admin-index-page.php");
			die;
		}

		else {
            $message = "ERROR 404";
			die;
		}
	}