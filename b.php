<?php include "./functions/includeAll.php";

$username = $_REQUEST['username'];
if ($username == "") {
    ?>
    <script>
        window.location.href = "../"
    </script>
<?php
}

$BlogMainPage = mysqli_query($conn, "SELECT * From blog WHERE blog_name='$username'");

while ($row = mysqli_fetch_assoc($BlogMainPage)) {
    $blogID = $row["id"];
    $blogName = $row["blog_name"];
    $user_idDATA = $row["user_id"];
}

$BlogPostsOnMainPage = mysqli_query($conn, "SELECT * From post WHERE user_id='$user_idDATA'");

if (mysqli_num_rows($BlogMainPage)) {

}
else{
    ?>
    <script>
        window.location.href = "../404"
    </script>
<?php
}

if(isset($_POST['submit'])){
    $postId = $_POST['post_id'];
    $like = $_POST['like'];
    $likes = $like+1;
    $date = date("Y-M-d");
    $query = "UPDATE post SET post_like='$likes' WHERE id='$postId'";
    $response = mysqli_query($conn,$query);

    if($response){
        $message = "Added Successfully";
        ?>
        <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                        location.reload();
                    }
                </script>

        <?php
    }
    else {
        $message = "Something went wrong";
    }
}


$profile_background = rand(1, 8);
if ($profile_background == 1) {
    $profile_bg = "https://steamuserimages-a.akamaihd.net/ugc/859484412646752506/97328E1940467BD74F344D3061C1AB3A9E2B6369/?imw=5000&imh=5000&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=false";
} else if ($profile_background == 2) {
    $profile_bg = "https://i.gifer.com/origin/3a/3a6fe9162f2314ca6df627ae5d903384.gif";
} else if ($profile_background == 3) {
    $profile_bg = "https://i.pinimg.com/originals/1f/aa/84/1faa84018e4ed6f5621e685dce8b6adb.gif";
} else if ($profile_background == 4) {
    $profile_bg = "https://i.gifer.com/Am67.gif";
} else if ($profile_background == 5) {
    $profile_bg = "https://64.media.tumblr.com/2df67fe7bdbba84c88cdbbdf84fd2743/tumblr_nqgvxz92HC1s85u2fo1_500.gifv";
} else if ($profile_background == 6) {
    $profile_bg = "https://c.tenor.com/Hrgi6ataa2QAAAAC/spring.gif";
} else if ($profile_background == 7) {
    $profile_bg = "https://i.pinimg.com/originals/87/81/0a/87810a0cf7c9f3d787b2a4059ab601ed.gif";
} else if ($profile_background == 8) {
    $profile_bg = "https://i.pinimg.com/originals/51/b6/90/51b6902f4030e1a9bb444b62af458a87.gif";
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/blogger.css">
    <link href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet" />

    <title><?php echo $blogName; ?></title>
</head>
<body>
    <section id="nav-section">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><h3 style="font-weight: 900;">D4D<span style="color: #222222;">evelopers</span></h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </section>
    <section id="post-card-section">
        <div class="post-head container-fluid">
            <h1 style="font-weight: 600;"><?php echo $username; ?></h1>
       </div>

       <br>
       <hr>
        <div class="row container-fluid">
        <?php
            while ($row = mysqli_fetch_assoc($BlogPostsOnMainPage)) {
                $postID = $row["id"];
                $postTitle = $row["post_title"];
                $postContent = $row["post_content"];
                $postAddedOn = $row["post_added"];
                $post_like = $row["post_like"];
                $archive  = $row["archive"];

        ?>
            <div class="col-md-4">
                <div class="card shadow-2" >
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -35px; cursor:pointer;">
                <?php echo $post_like; ?> Likes <i class="fas fa-heart"></i>
                      </span>
                    <img src = "<?php echo $profile_bg ?>" class="card-img-top" alt="blog-img">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $postTitle; ?></h5>
                      <p class="card-text">Published on: <?php echo $postAddedOn  ?></p>
                      <a href="../p/<?php echo $postID; ?>" class="btn btn-primary">Read This Post</a>
                      <form action="" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $postID; ?>">
                        <input type="hidden" name="like" value="<?php echo $post_like; ?>">
                        <button type="submit" name="submit"><i class="fas fa-thumbs-up"></i></button>
                        <br><br>
                      </form> 
                      
                    </div>
                  </div>
            </div>

            <?php } ?>

            
           
            
            
            
        </div>
    </section>
    <div class="subscribe">
        <div class="row">
            <div class="col-sm-6 col1sub">
                <h3>Loving our blogs?</h3>
                <h3>Subscribe for more</h3>
                <br><br>
                <a href="#" class="btn btn-primary">Subscribe Our Blog</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <p> © 2022 D4Developers | All Rights Reserved</p>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>