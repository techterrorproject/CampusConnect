<?php
include 'includes/functions.php';
if (!isset($_SESSION['user'])) header('Location: login.php');
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile - CampusConnect</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
  <div class="profile-box">
    <h2>Your Profile</h2>
    <p>Name: <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <p>Department: <?= htmlspecialchars($user['department']) ?></p>
  </div>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
