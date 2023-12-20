<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    $user_data_id = $user_data['id'];

    $query      = "SELECT * FROM user_cart WHERE user_id = $user_data_id";
    $result     = mysqli_query($con, $query);

    // Sum Total Amount of Purchased Items
    function total_income(){
        include("actions/database-connect.php");
        $user_data = check_login($con);
        $user_data_id = $user_data['id'];
        $query        = "SELECT  SUM(product_price) from user_cart WHERE user_id = $user_data_id";
        $query_result = mysqli_query($con, $query);
        $total_income = mysqli_fetch_array($query_result);

        return !empty($total_income) ? number_format($total_income[0]) : 0 ;
    }
    
    function total_quantity(){
        include("actions/database-connect.php");
        $query        = "SELECT  SUM(product_quantity) from user_cart";
        $query_result = mysqli_query($con, $query);
        $total_quantity = mysqli_fetch_array($query_result);

        return !empty($total_quantity) ? number_format($total_quantity[0]) : 0 ;
    }
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
    <title>Love Strings | Checkout Items</title>
</head>
<body>
    <div class="main-container user-checkout">
        <div class="default-navbar">
            <div class="row">
                <div class="col-2 md-2">
                    <a class="navbar-brand" href="user-index-page.php">
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
                            <a class="nav-link" href="user-cart-page.php">
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
            <h3>♡ ORDER SUMMARY ♡</h3>
            <div class="container-fluid">
                <form action="actions/checkout-function.php" method="post">
                    <div class="row">
                        <div class="col-7">
                            <div class="basic-info">
                                <div class="row">
                                    <div class="col">
                                        <p class="title-ordersum" style="margin-left: 12px; margin-top: 12px">Basic Information</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="user_name" id="floatingName" placeholder="Name" value="<?php echo $user_data['first_name'] ." " .$user_data['last_name']?>">
                                            <label for="floatingName">Name</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="contact_number" minlength="11" maxlength="11"id="floatingContactNum" placeholder="Contact Number" value="<?php echo $user_data['contact_number']?>" required>
                                            <label for="floatingContactNum">Contact Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="hidden" name="user_id" value="<?php echo $user_data['id']?>">
                                            <input type="hidden" name="user_email" value="<?php echo $user_data['email']?>">
                                            <input type="hidden" name="phone_number" value="<?php echo $user_data['contact_number']?>">
                                            <input type="hidden" name="user_address" value="<?php echo $user_data['address']?>">
                                            <input type="hidden" name="product_quantity" value="<?php echo total_quantity();?>">

                                            <input type="text" class="form-control" name="user_address" id="floatingAddress" placeholder="Address" value="<?php echo $user_data['address']?>" required>
                                            <label for="floatingAddress">Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingPaymentOption" value="Cash on Delivery" disabled>
                                            <label for="floatingPaymentOption">Payment Option</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating">
                                                <p class="title-ordersum">Notes (Optional):</p>
                                                <input class="user-notes" name="user_notes" placeholder="Please note the size (Small, Medium, Large) when ordering an Appawrel"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="item-list">
                                <div class="row">
                                    <div class="col">
                                        <table class="table align-middle table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product Type</th>
                                                    <th scope="col">Items</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <?php while($row = mysqli_fetch_array($result)){ ?>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $row['product_type'];?></td>
                                                        <td><?php echo $row['product_name'];?></td>
                                                        <td><?php echo $row['product_quantity'];?></td>
                                                        <td>₱ <?php echo $row['product_price'];?></td>
                                                    </tr>
                                                </tbody>
                                            <?php }?>
                                        </table>
                                        <p class="user-total-cart">Total: ₱ <?php echo total_income();?></p>
                                        <input type="hidden" name="product_price" value="<?php echo total_income();?>">
                                        <input type="hidden" name="product_quantity" value="<?php echo total_quantity();?>">
                                        <?php
                                            $sql = "SELECT COUNT(*) FROM user_cart WHERE user_id = $user_data_id";
                                            $result = mysqli_query($con, $query); 
                                            if ($result->num_rows > 0) {
                                                echo '<button role="button" type="submit" class="user-placeOrder-btn">Place Order</button>
                                                    <a href="user-cart-page.php" class="btn-secondary btn user-return-btn">Return</a>
                                                    ';
                                            }
                                            
                                            else {
                                                echo '<button role="button" type="submit" disabled class="user-placeOrder-btn">Place Order</button>
                                                    <a href="user-cart-page.php" class="btn-secondary btn user-return-btn">Return</a>
                                                    ';
                                            }
                                        ?>
                                    </div>
                                </div>
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