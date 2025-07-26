<?php
include 'includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] === $_POST['confirm_password']) {
        if (register($_POST)) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Email already exists!";
        }
    } else {
        $error = "Passwords do not match!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up - CampusConnect</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
  <form method="post">
    <h2 class="text-4xl font-bold">Sign Up</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <input name="first_name" required placeholder="First Name">
    <input name="last_name" required placeholder="Last Name">
    <input name="email" type="email" required placeholder="Email">
    <input name="department" required placeholder="Department">
    <input name="password" type="password" required placeholder="Password">
    <input name="confirm_password" type="password" required placeholder="Confirm Password">
    <button type="submit">Sign Up</button>
    <p class="text-md text-gray-500">Already have an account? <a href="login.php" class="text-blue-600">Login</a></p>
  </form>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
