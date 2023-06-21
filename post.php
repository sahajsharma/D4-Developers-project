
<?php include "./functions/includeAll.php";

$pageCode = "post";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- head -->

<?php include "partials/dashboard-head.php"?>

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
        <h1 class="post">All Posts</h1>

        <span style="display: flex; justify-content:flex-end">
        <button class="shadow-2">Add new post <i class="fas fa-edit"></i></button>
        </span>
        
        
        <center><hr style="width: 10%;"></center>
        <br><br>

        <?php
            while ($row = mysqli_fetch_assoc($postData)) {
                $postID = $row["id"];
                $postTitle = $row["post_title"];
                $postContent = $row["post_content"];
                $postAddedOn = $row["post_added"];
                $post_like = $row["post_like"];
                $archive  = $row["archive"];

        ?>
            <div class="flex-container shadow-7">
                <div class="flex-item-left">
                    <img src="https://enally.in/live/DANL/images/blog-1.webp" alt="">
                </div>
                <div class="flex-item-right">
                    <span><?php echo $postTitle; ?></span>
                    <br>
                    <span >Read this post <a style="text-decoration: none;" href="p/<?php echo $postID ?>">Click here</a></span>
                    <div class="blog-details">
                         <span class="author"> on </span> Published: <?php echo $postAddedOn ?>  <span class="date"><span class="author"> | </span> <span style="color: #0D6EFD;">10K <i class="fas fa-thumbs-up" ></i></span> <span class="delete_btn" style=" display: flex; justify-content: flex-end; cursor: pointer; color: #bbb"><i class="fas fa-trash-alt"></i></span></span>
                    </div>              

                </div>
            </div>

            <br><br>

        <?php } ?>

    </div>

<?php include "partials/dashboard-footer.php"?>
</body>

</html>