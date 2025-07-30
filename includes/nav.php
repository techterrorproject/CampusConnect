<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="flex justify-between bg-sky-500 px-5 py-5 items-center">
    <div class="logo">
        <h2 class="font-bold text-3xl text-white">CampusConnect</h2>
    </div>
    <div class="search">
        <input class="border rounded-md placeholder:p-2 placeholder:bg-white border-gray-300" type="text" name="search" id="search" placeholder="search...">
        <input class="bg-sky-200 hover:bg-green-500 rounded-md text-white p-[1px] px-2" type="submit" value="Search">
    </div>
    <div class="text-white flex gap-4">
        <a class="hover:underline" href="index.php">Home</a>
        <a class="hover:underline" href="#">Notes</a>
        <a class="hover:underline" href="#">Questions</a>
        <?php if(isset($_SESSION['user'])){ ?>
            <a class="hover:underline" href="upload.php">Upload</a>
            <a class="hover:underline" href="profile.php">Profile</a>
            <a class="hover:underline" href="logout.php">Logout</a>
        <?php }  else { ?>
            <a class="hover:underline" href="login.php">Login</a>
            <a class="hover:underline" href="signup.php">Sign Up</a>
        <?php } ?>
    </div>
</nav>