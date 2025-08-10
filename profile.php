<?php
include 'includes/functions.php';
if (!isset($_SESSION['user'])) header('Location: login.php');
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile - CampusConnect</title>
<?php include 'includes/head.php'; ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

<div class="flex flex-1 items-center justify-center p-6">
  <div class="bg-white shadow-xl rounded-2xl max-w-md w-full p-8 text-center">
    <div class="w-28 h-28 mx-auto rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white text-4xl font-bold shadow-md">
      <?= strtoupper(substr($user['first_name'], 0, 1)) ?>
    </div>
    <h2 class="mt-4 text-2xl font-semibold text-gray-800">
      <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
    </h2>
    <p class="text-gray-500 mt-1">
      <?= htmlspecialchars($user['department']) ?>
    </p>
    <hr class="my-6 border-gray-200">
    <div class="text-left space-y-3">
      <p class="flex items-center">
        <i class="fas fa-envelope text-blue-500 w-6"></i>
        <span class="ml-2"><?= htmlspecialchars($user['email']) ?></span>
      </p>
      <p class="flex items-center">
        <i class="fas fa-user-graduate text-purple-500 w-6"></i>
        <span class="ml-2"><?= htmlspecialchars($user['department']) ?></span>
      </p>
    </div>
    <button 
      onclick="location.href='edit_profile.php'" 
      class="mt-6 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
      Edit Profile
    </button>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
