<?php

$sql_query = mysqli_query($conn, "SELECT * From users WHERE email='$EMAIL' AND public='1'");
$personaldata = mysqli_query($conn, $sql_query);

while ($row = mysqli_fetch_assoc($personaldata)) {
    $user_id = $row["id"];
    $email = $row['email'];
    $name = $row['name'];
    $gender = $row['gender'];
    $userType = $row['userType'];
    $phone = $row['phone'];
    $eduBranch = $row['eduBranch'];
    $joined_on = $row['joined_on'];
}
