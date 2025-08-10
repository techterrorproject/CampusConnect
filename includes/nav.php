<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="bg-sky-500 px-6 py-4 flex flex-wrap items-center justify-between">
    <div class="flex items-center gap-2">
        <a href="index.php" class="font-bold text-2xl md:text-3xl text-white">
            CampusConnect
        </a>
    </div>
    <div class="flex items-center gap-2 my-2 md:my-0">
        <form action="search.php" method="GET" class="flex items-center gap-2 my-2 md:my-0">
            <input class="bg-white text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md px-3 py-1 w-32 md:w-48 focus:outline-none focus:ring-2 focus:ring-white" type="text" name="q" placeholder="Search..." value="<?php if(isset($_GET['q'])) echo htmlspecialchars($_GET['q']); ?>">
            <input class="bg-white text-sky-500 font-semibold rounded-md px-3 py-1 hover:bg-sky-100 transition" type="submit" value="Search">
        </form>
    </div>
    
    <div class="flex gap-4 text-white text-sm md:text-base mt-2 md:mt-0">
        <a class="hover:underline" href="index.php">Home</a>
        <button data-type="Note" class="filter-btn text-white hover:underline bg-transparent p-0 border-0 cursor-pointer">Notes</button>
        <button data-type="Question" class="filter-btn text-white hover:underline bg-transparent p-0 border-0 cursor-pointer">Questions </button>

        <?php if(isset($_SESSION['user'])){ ?>
            <a class="hover:underline" href="upload.php">Upload</a>
            <a class="hover:underline" href="profile.php">Profile</a>
            <a class="hover:underline" href="logout.php">Logout</a>
        <?php } else { ?>
            <a class="hover:underline" href="login.php">Login</a>
            <a class="hover:underline" href="signup.php">Sign Up</a>
        <?php } ?>
    </div>
</nav>
