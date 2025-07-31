<?php
    include 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en" class="min-h-screen flex flex-col">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Forgot Password - CampusConnect</title>
    <?php include 'includes/head.php'; ?>
</head>
<body class="flex flex-col flex-1 bg-gray-100">
    <?php include 'includes/nav.php'; ?>
    <main class="flex-1 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-8 text-center">
            <h2 class="text-3xl font-bold text-blue-400 mb-6">Forgot Password</h2>
            <p class="mb-4 text-gray-600">
                Enter your email address below and we'll send you a link to reset your password.
            </p>
            <form method="post" action="forgot_password_handler.php" class="flex flex-col space-y-4">
                <label for="email" class="sr-only">Email address</label>
                <input id="email" name="email" type="email" placeholder="Your email address" required class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <button type="submit" class="bg-blue-400 hover:bg-blue-500 transition text-white rounded-md px-4 py-2 font-semibold"> Send Reset Link </button>
            </form>
            <p class="mt-6 text-gray-500 text-sm"> Remembered your password? <a href="login.php" class="text-blue-500 hover:underline">Login here</a></p>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
