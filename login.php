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
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <?php include 'includes/nav.php'; ?>
    <main class="flex-1 flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-center">
            <form method="post" class="flex flex-col space-y-4">
                <h2 class="text-4xl font-bold text-blue-400">Login</h2>
                <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
                <input class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" name="email" type="email" placeholder="Email" required>
                <input class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" name="password" type="password" placeholder="Password" required>
                <button type="submit" class="bg-blue-400 text-white rounded-md px-4 py-2 w-full hover:bg-blue-500 transition">Login</button>
                <a href="forgot.php" class="text-sm text-gray-500 hover:underline">Forgot password?</a>
                <a href="signup.php" class="text-md text-gray-500 hover:underline">Create an account</a>
            </form>
        </div>
    </main>
    <?php include 'includes/footer.php' ?>
</body>
</html>
