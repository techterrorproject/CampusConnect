<?php include 'includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en" class="min-h-screen flex flex-col">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php include 'includes/head.php'; ?>
    <title>CampusConnect</title>
</head>
<body class="flex flex-col flex-1 bg-gray-100">
    <?php include 'includes/nav.php'; ?>
    <main class="flex-1 flex flex-col">
    <div class="text-center max-w-7xl mx-auto w-full px-4">
        <!-- banner section -->
        <section class="bg-blue-500 text-white rounded-xl shadow-lg p-10 md:p-20 my-6">
        <h1 class="font-bold text-3xl md:text-4xl mb-2">Welcome to CampusConnect</h1>
        <p class="text-md md:text-lg">Share and download notes & questions for your university easily.</p>
        </section>

        <!-- toggle-buttons simple filter option -->
        <section class="flex gap-3 justify-center my-4">
            <button data-type="all" class="filter-btn bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition">All</button>
            <button data-type="Note" class="filter-btn bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition">Notes</button>
            <button data-type="Question" class="filter-btn bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition">Questions</button>
        </section>

        <!-- files grid -->
        <section id="file-cards" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-6">
            <!-- Cards loaded here by AJAX -->
        </section>
    </div>
    </main>
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>

    <script>
        window.onload = () => {
        loadFiles('all');

        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', () => {
            loadFiles(button.getAttribute('data-type'));
            });
        });
        };
    </script>
</body>
</html>
