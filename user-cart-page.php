<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    $user_data_id = $user_data['id'];

    $query      = "SELECT * FROM user_cart WHERE user_id = $user_data_id";
    $result     = mysqli_query($con, $query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="css/images/logo/logo-favicon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Love Strings | My Cart</title>
</head>
<body>
    <div class="main-container user-profile">
        <div class="default-navbar">
            <div class="row">
                <div class="col-2 md-2">
                    <a class="navbar-brand" href="#">
                        <img src="css/images/logo/logo.png" alt="logo" width="48" height="48">
                    </a>
                </div>
                <div class="col-8 md-5">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="user-index-page.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-shop-page.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-collection-page.php">Collections</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-faq-page.php">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-custom-page.php">Custom</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 md-5">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="user-profile-page.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="actions/logout-function.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z"/>
                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="user-cart-items">
            <h3>♡ MY CART ♡</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Type</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php 
                                                $get_image = $row['product_image'];

                                                echo    '<div>
                                                            <img style="border-radius: 9px; box-shadow: 6px 7px 11px 3px #646464;" height="120px;" src="css/images/shop-item-collections/'.$get_image.'"></img>
                                                        </div>';
                                            ?>
                                        </td>
                                        <td><?php echo $row['product_type'];?></td>
                                        <td><?php echo $row['product_name'];?></td>
                                        <td><?php echo $row['product_quantity'];?></td>
                                        <td>₱<?php echo number_format($row['product_price']);?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-option" data-bs-toggle="modal" data-bs-target="#modallDeleteItemInCart<?php echo $row['cart_id'];?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php include 'modal/delete-item-in-cart.php'; }?>
                        </table>
                    </div>
                </div>
                <form action="user-checkout-page.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="btn-buyAll">
                                <?php
                                    $sql = "SELECT COUNT(*) FROM user_cart";
                                    $result = mysqli_query($con, $query); 
                                    if ($result->num_rows > 0) {
                                        echo '<button class="btn-checkout" role="button" type="submit">Check Out</button>';
                                    }
                                    
                                    else {
                                        echo '<button disabled class="btn btn-danger btn-checkout" role="button">Check Out</button>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>