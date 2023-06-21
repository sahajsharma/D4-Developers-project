<?php
 include "./functions/includeAll.php";

$username = $_REQUEST['username'];

 $username;

$username = $_REQUEST['username'];
if ($username == "") {
    ?>
    <script>
        window.location.href = "../"
    </script>
<?php
}

$BlogMainPage = mysqli_query($conn, "SELECT * From post WHERE id='$username'"); 

while ($row = mysqli_fetch_assoc($BlogMainPage)) {
    $blogID = $row["id"];
    $postTitle = $row["post_title"];
    $user_idDATA = $row["user_id"];
    $post_added = $row["post_added"];
    $post_content = $row["post_content"];
}

$BlogPostsOnMainPage = mysqli_query($conn, "SELECT * From post WHERE id='$username'");

if (mysqli_num_rows($BlogMainPage)) {

}
else{
    ?>
    <script>
        window.location.href = "../404"
    </script>
<?php
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
    <title>Blog</title>
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
    <div class="blog">
        <h2><?php echo $postTitle ?></h2>
        <p class="text-muted">Published on: <?php echo $post_added ?></p>
        <img src="https://enally.in/live/DANL/images/talk-to-expert-bg.jpg" alt="blog">
        <p><?php echo $post_content ?></p>
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