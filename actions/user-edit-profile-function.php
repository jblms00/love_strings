<?php 
// Always include these when logging in and when using database
include("database-connect.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //if data is entered..
    $id = $_POST['id'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    
    // if the entered data is not blank it will insert or save to the database
    if (!empty($first_name) && ($last_name) && ($contact_number) && ($address)) {
        $query = "UPDATE `users` SET `first_name`='$first_name', 
                                    `last_name`='$last_name',
                                    `contact_number`='$contact_number',
                                    `address`='$address'
            WHERE `id` = '$id'";

        if ($result = mysqli_query($con, $query)) {
            header("Location: ../user-profile-page.php");
            die;
        }
    }

    else {
        // header("Location: ../user-profile.php");
        die;
    }
}