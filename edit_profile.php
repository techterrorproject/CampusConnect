<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'includes/functions.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);

    $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, department=? WHERE id=?");
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $department, $user['id']);
    $stmt->execute();

    $_SESSION['user']['first_name'] = $first_name;
    $_SESSION['user']['last_name'] = $last_name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['department'] = $department;

    header('Location: profile.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile - CampusConnect</title>
  <?php include 'includes/head.php'; ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

<div class="flex flex-1 items-center justify-center p-6">
  <form method="post" class="bg-white shadow-xl rounded-2xl max-w-md w-full p-8 space-y-6">
    <h2 class="text-3xl font-bold text-gray-800 text-center">Edit Profile</h2>

    <input type="text" name="first_name" required placeholder="First Name" value="<?= htmlspecialchars($user['first_name']) ?>" class="w-full p-3 border rounded-md" />
    <input type="text" name="last_name" required placeholder="Last Name" value="<?= htmlspecialchars($user['last_name']) ?>" class="w-full p-3 border rounded-md" />
    <input type="email" name="email" required placeholder="Email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full p-3 border rounded-md" />
    <input type="text" name="department" required placeholder="Department" value="<?= htmlspecialchars($user['department']) ?>" class="w-full p-3 border rounded-md" />

    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
      Save Changes
    </button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
