<?php include 'includes/functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>CampusConnect</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">

  <section 
  class="h-64 bg-cover bg-center rounded-xl text-white flex flex-col items-center justify-center"
  style="background-image: url('https://i.ibb.co/Kj481Bjj/diu-banner.jpg');">
  <h1 class="text-4xl font-bold">Welcome to CampusConnect</h1>
  <p class="mt-2 text-lg">Share and download notes & questions for your university easily.</p>
</section>


  <section class="toggle-btns">
    <button onclick="loadFiles('all')">All</button>
    <button onclick="loadFiles('Note')">Notes</button>
    <button onclick="loadFiles('Question')">Questions</button>
  </section>

  <section id="file-cards" class="grid">
    <!-- loaded via AJAX -->
  </section>
</div>
<footer>&copy; 2025 CampusConnect</footer>
<script src="js/script.js"></script>
<script>
  window.onload = () => loadFiles('all');
</script>
</body>
</html>
