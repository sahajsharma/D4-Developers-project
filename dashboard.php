
<?php include "./functions/includeAll.php"; ?>
<?php $pageCode = "dashboard";


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- head -->

<?php  include("partials/dashboard-head.php") ?>


<body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <?php  include("partials/dashboard-header.php") ?>
    <!--header area end-->

    <!-- Sidebar -->
    <?php include("partials/dashboard-sidebar.php") ?>
    <input type="hidden" id="userId" value="<?php echo $user_id;  ?>">
    <!--sidebar end-->

    <div class="content" style="background-image: url('https://enally.in/live/DANL/images/contact-wave-2.png');">
        <div class="form">
            <form action="" class="shadow-7" style="border-radius: 8px;">
                <h1>Create a new blog</h1>
                <div class="input-field">
                    
                    <input type="text" id="blog_name" placeholder="Enter you blog name">
                </div>
                <p id="search_response"></p>
                <div class="input-field">
                    <button type="button" id="checkAvability" class="shadow-2 uppercase"> Create my blog </button>
                </div>
            </form>
        </div>
    </div>

<?php include("partials/dashboard-footer.php") ?>
</body>

</html>