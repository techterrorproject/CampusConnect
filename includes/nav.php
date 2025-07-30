<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav>
    <div class="logo">
        <h2>CampusConnect</h2>
    </div>
    <div class="search">
        <input type="text" name="search" id="search" placeholder="search...">
    </div>
    <div class="links">
        <a href="index.php">Home</a>
        <a href="#">Notes</a>
        <a href="#">Questions</a>
        <?php if(isset($_SESSION['user'])){ ?>
            <a href="upload.php">Upload</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php }  else { ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        <?php } ?>
    </div>
</nav>