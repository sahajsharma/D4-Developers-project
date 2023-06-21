<!--mobile navigation bar start-->
<div class="mobile_nav">
        <div class="nav_bar">
            <img src="https://enally.in/live/DANL/images/Ellipse-5.png" class="mobile_profile_image" alt="">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Posts</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
        </div>
    </div>
    <!--mobile navigation bar end-->

    <!--sidebar start-->
    <div class="sidebar shadow-3">
        <div class="profile_info">
            <img src="https://enally.in/live/DANL/images/Ellipse-5.png" class="profile_image" alt="">
            <h4><?php echo @$blogName; ?> <br> <br> <center><span style=" cursor: pointer; color: #0D6EFD; " onclick="window.location.href='b/<?php echo $blogName; ?>'" >View blog</sapn></center> </h4>
            <p><?php echo $email; ?></p>
        </div>
        <a href="dashboard" <?php if(@$pageCode == "dashboard"){ echo 'class="active"';} ?>><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="post" <?php if(@$pageCode == "post"){ echo 'class="active"';} ?>><i class="fas fa-newspaper"></i><span>Posts</span></a>
        <a href="editor" <?php if(@$pageCode == "editor"){ echo 'class="active"';} ?>><i class="fas fa-pen"></i><span>Text Editor</span></a>
        <a href="#" <?php if(@$pageCode == "settings"){ echo 'class="active"';} ?>><i class="fas fa-user-cog"></i><span>Settings</span></a>
    </div>