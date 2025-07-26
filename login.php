<?php
include 'includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (login($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Wrong Credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - CampusConnect</title>
<link rel="stylesheet" href="css/style.css">
<!-- tailwind css -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
  <form method="post">
    <h2 class="text-4xl font-bold">Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <a href="#" class="text-sm text-gray-400">Forgot password?</a>
    <br>
    <a href="signup.php" class="text-md text-gray-400">Create an account</a>
  </form>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
