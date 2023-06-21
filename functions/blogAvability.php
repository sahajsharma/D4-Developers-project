<?php
//database and emails
include 'connection.inc.php';
// Error, connection and other
include 'MainFunctions.php';
//email pass and salt code
include "confidentials.php";

// echo "success"; 

$blogName = $_POST['blog_name'];
$userId = $_POST['userId'];
$date = date("Y-M-d");

$blogUrl = $blogName.$userId;

$checkBlogNameAvability = mysqli_query($conn, "SELECT * From blog WHERE blog_name='$blogName'");

if (mysqli_num_rows($checkBlogNameAvability)) {
    echo "Blog name not Available";
}
else {
    $query = "INSERT INTO blog (blog_name, blog_url,user_id, created_on) VALUES ('$blogName', '$blogUrl',  '$userId', '$date')";
    if (mysqli_query($conn, $query)) {
        echo "Blog Created Successfully!";
    } else {
        echo mysqli_error($conn);
        echo "Something went wrong. This issue has been reported to the developer.";
    }
}