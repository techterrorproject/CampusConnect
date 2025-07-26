<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- tailwind css -->
  <?php include 'includes/head.php'; ?>
</head>
<body>
  <nav>
    <div class="left"><a href="index.php">CampusConnect</a></div>
    <div class="middle"><input type="text" placeholder="Search..."></div>
    <div class="right">
      <a href="index.php">Home</a>
      <a href="#" onclick="loadFiles('Note')">Notes</a>
      <a href="#" onclick="loadFiles('Question')">Questions</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a href="upload.php">Upload</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
      <?php endif; ?>
    </div>
  </nav>
</body>
</html>
