<?php
include 'connection.inc.php';
include 'MainFunctions.php';
include "confidentials.php";
include "../smtp/PHPMailerAutoload.php";
session_start();

// Getting form data using post
$email = $_POST['email'];
$password = $_POST['password'];

// Password verification
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

// Password salting
$submit_password = sha1($password . $salt);

// Date and predefine vaiables
$date = date("Y-M-d");
$status = 1;
$public = 1;

// Email Password and Database insertion.

if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
} else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmailIfExitst = mysqli_query($conn, "SELECT * From users WHERE email='$email'");

        if ($email == @$_SESSION['EMAIL_details']) {
            unset($_SESSION['EMAIL_details']);
            if (mysqli_num_rows($checkEmailIfExitst)) {
                echo "Email is already registered!";
            } else {
                $query = "INSERT INTO users (email, password, joined_on, status, public) VALUES ('$email', '$submit_password',  '$date', '$status', '$public')";

                if (mysqli_query($conn, $query)) {
                    echo "Account Has Been Created Successfully!";
                } else {
                    echo mysqli_error($conn);
                    echo "Something went wrong. This issue has been reported to the developer.";
                }
            }
        } else {
            echo "Session Expired. Try Again.";
        }

    } else {
        echo "Please enter a correct email address.";
    }
}
