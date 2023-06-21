<?php include "./functions/includeAll.php";
$pageCode = "editor";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- head -->

<?php include "partials/dashboard-head.php"?>

<?php

if(isset($_POST['submit'])){
    $blogTitle = $_POST['Blog_title'];
    $blogContent = $_POST['editor'];
    $date = date("Y-M-d");
    $query = "INSERT INTO  post  (post_title, post_content,post_added, user_id) VALUES ('$blogTitle', '$blogContent', '$date', '$USERID')";
    $response = mysqli_query($conn,$query);

    if($response){
        $message = "Added Successfully";
    }
    else {
        $message = "Something went wrong";
    }
}

?>

<body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <?php include "partials/dashboard-header.php"?>
    <!--header area end-->

    <!-- Sidebar -->
    <?php include "partials/dashboard-sidebar.php"?>

    <input type="hidden" id="userId" value="<?php echo $user_id; ?>">
    <!--sidebar end-->

    <div class="content post-section">
        <h1 class="post" style="text-align: start;">Add New post</h1>

        <script src="ckeditor/ckeditor.js"></script>
        <form action="" method="POST">
            <input type="text" name="Blog_title" class="editor_input" placeholder="Blog Title Here">
            <br><br>

            <textarea name="editor" id="editor" class="ckeditor"></textarea>
            <br><br>
            <div style=" display: flex; justify-content: flex-end;">
                <input type="submit" value="Post Publicly" class="editorBtn shadow-2"  name="submit"> 
            </div>
            <br>
            <br>
            <p><?php  echo @$message; ?></p>
        </form>
    

    </div>

<?php include "partials/dashboard-footer.php"?>

</body>
</html>