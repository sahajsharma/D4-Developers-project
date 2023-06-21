<?php
include("./functions/includeAll.php");

unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['username']);
unset($_SESSION['email']);
?>
<script>window.location.href="./"</script>
<?php
die();
?>

