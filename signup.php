<?php
include 'includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] === $_POST['confirm_password']) {
        if (register($_POST)) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Account already exists!";
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
<?php include 'includes/head.php' ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>
<main class="flex-1 flex items-center justify-center">
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-center">
    <form method="post" class="flex flex-col space-y-4">
      <h2 class="text-4xl font-bold text-blue-400">Sign Up</h2>
      <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
      <input name="first_name" required placeholder="First Name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <input name="last_name" required placeholder="Last Name" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <input name="email" type="email" required placeholder="Email" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <input name="department" required placeholder="Department" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <input name="password" type="password" required placeholder="Password" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <input name="confirm_password" type="password" required placeholder="Confirm Password" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      <button type="submit" class="bg-blue-400 text-white rounded-md px-4 py-2 w-full hover:bg-blue-500 transition">Sign Up</button>
      <p class="text-md text-gray-500">Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Login</a></p>
    </form>
  </div>
</main>
<?php include 'includes/footer.php' ?>
</body>
</html>
