<?php include 'includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" class="min-h-screen flex flex-col">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampusConnect</title>
  <?php include 'includes/head.php'; ?>
</head>
<body class="flex flex-col flex-1">
    <?php include 'includes/nav.php'; ?>
    <main class="flex-1 flex flex-col">
        <div class="text-center max-w-7xl mx-auto w-full">
          <!-- banner section -->
            <section class="banner bg-blue-500 p-20 text-white my-5 rounded-lg">
                <h1 class="font-bold text-4xl">Welcome to CampusConnect</h1>
                <p>Share and Download notes & questions for your university easily.</p>
            </section>
            <!-- toggle-buttons -->
            <section class="flex gap-4 justify-center">
                <button class="bg-blue-500 text-white rounded-sm px-4 py-1">All</button>
                <button class="bg-blue-500 text-white rounded-sm px-4 py-1">Notes</button>
                <button class="bg-blue-500 text-white rounded-sm px-4 py-1">Questions</button>
            </section>
            <!-- all files -->
            <section>
              <!-- cards go here -->
            </section>
        </div>
    </main>
    <hr class="my-5">
    <?php include 'includes/footer.php'; ?>
</body>
</html>
