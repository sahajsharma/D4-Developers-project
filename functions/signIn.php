<?php
//database and emails
include 'connection.inc.php';
// Error, connection and other
include 'MainFunctions.php';
//email pass and salt code
include "confidentials.php";

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$verify_password = sha1($password . $salt);

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $sql_query = "SELECT * FROM users WHERE email='$email'";
    $personaldata = mysqli_query($conn, $sql_query);

    while ($row = mysqli_fetch_assoc($personaldata)) {
        if ($row['status'] == 0) {
            echo "<b>Your Account is blocked! Please write us email for more details or visit help center. <a href='contact'>Click Here</a></b>.";
        } else {
            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            } else {

                $get_info = mysqli_query($conn, "select * from users where email='$email' and password='$verify_password'");
                $check_user = mysqli_num_rows($get_info);

                if ($check_user > 0) {
                    $row = mysqli_fetch_assoc($get_info);
                    //session_start();
                    $_SESSION['USER_LOGIN'] = "YES";
                    $_SESSION['USER_ID'] = $row['id'];
                    $_SESSION['EMAIL'] = $row['email'];

                    if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'YES') {
                        ?>
                        <script>window.location.href="./dashboard"</script>
                        <?php
}
                } else {
                    echo "Wrong Username or Password!";
                }
            }
        }
    }
} else {
    echo ("$email is not a valid email address");
}