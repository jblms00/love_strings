<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
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
    <title>Love Strings | Collections</title>
</head>
<body>
    <div class="main-container user-faq-page">
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
                            <a class="nav-link" href="#">FAQs</a>
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
        <div class="faq-content">
            <h1>♡ FREQUENTLY  ASKED QUESTIONS ♡</h1>
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">HOW TO ORDER</p>
                        <ol>
                            <li class="description">Browse through our catalogue and find the piece you like!</li>
                            <li class="description">Click ‘Add to Cart’</li>
                            <li class="description">Check out your order/s and fill in the necessary information.</li>
                            <li class="description">Take note of the instructions on how to process your payment:</li>
                        </ol>
                        <p class="description">* Prices of the items do not include shipping fee</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">WHAT TO DO WHEN RECIEVING ORDERS</p>
                        <p class="description">Always make sure to take a full video opening the pouch to the item itself so that if the items are damaged/missing you can provide proof. We do not allow photos only as proof since items can be tampered.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">HOW DO I PAY FOR MY ORDER? WHAT ARE YOUR PAYMENT OPTIONS?</p>
                        <p class="description">Cash on Delivery IS accepted and you can order on this website.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">ARE THE ITEMS AVAILABLE ONHAND?</p>
                        <p class="description">Yes</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">DO YOU ACCEPT INTERNATIONAL ORDERS?</p>
                        <p class="description">Love Strings is currently available in the Philippines nationwide.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">HOW MUCH ARE YOUR SHIPPING FEES?</p>
                        <p class="description">Currently, there are no shipping fees.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="title">RETURNS AND REFUND</p>
                        <p class="description">We only allow refunds/returns if the items are damaged/defective/missing. We always make sure to take a full video opening the pouch to the item itself so that if the items are damaged/missing you can provide proof. we do not allow photos only as proof since items can be tampered.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>