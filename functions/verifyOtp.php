<?php
session_start();

if (session_id() == "") {
    echo "OTP expired!";
} else {

    $otp_entered = $_POST['otp'];

    if ($otp_entered == @$_SESSION['EMAIL_OTP']) {
        unset($_SESSION['EMAIL_OTP']);
        echo "success";
    } else {
        echo "Wrong OTP, Please try again!";
    }
}
