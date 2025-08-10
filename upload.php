<?php
include 'includes/functions.php';
if (!isset($_SESSION['user'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload - CampusConnect</title>
  <?php include 'includes/head.php'; ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

<div class="flex flex-1 items-center justify-center p-6">
  <div class="bg-white shadow-xl rounded-2xl max-w-md w-full p-8 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Select Upload Type</h2>
    
    <div class="flex flex-col space-y-6">
      <button 
        onclick="location.href='upload_note.php'"
        class="py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
        Upload Note
      </button>

      <button 
        onclick="location.href='upload_question.php'"
        class="py-3 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition">
        Upload Question
      </button>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
