<?php
include 'includes/functions.php';
if(!isset($_SESSION['user'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload - CampusConnect</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container" style="text-align:center; margin-top: 50px;">
  <h2>Select Upload Type</h2>
  <button onclick="location.href='upload_note.php'" style="padding:10px 20px; margin: 10px;">Upload Note</button>
  <button onclick="location.href='upload_question.php'" style="padding:10px 20px; margin: 10px;">Upload Question</button>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
