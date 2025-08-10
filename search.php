<?php
include 'includes/db.php';

$search = isset($_GET['q']) ? $_GET['q'] : '';

if ($search == '') {
    header("Location: index.php");
    exit;
}

$query = "SELECT f.*, u.first_name, u.last_name
          FROM files f
          JOIN users u ON f.uploaded_by = u.id
          WHERE f.course_code LIKE '%$search%'
             OR f.course_title LIKE '%$search%'
             OR f.department LIKE '%$search%'
             OR u.first_name LIKE '%$search%'
             OR u.last_name LIKE '%$search%'
          ORDER BY f.uploaded_at DESC";

$run = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en" class="min-h-screen flex flex-col">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php include 'includes/head.php'; ?>
    <title>Search Results - CampusConnect</title>
</head>
<body class="flex flex-col flex-1 bg-gray-100">
<?php include 'includes/nav.php'; ?>

<main class="flex-1 flex flex-col">
    <div class="text-center max-w-7xl mx-auto w-full px-4">
        <h1 class="text-2xl font-bold my-6">Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>

        <section id="file-cards" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-6">
            <?php if(mysqli_num_rows($run) > 0){ ?>
                <?php while($file = mysqli_fetch_assoc($run)) { ?>
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col justify-between border-l-4 border-blue-500">
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800"><?= htmlspecialchars($file['course_title']); ?></h3>
                            <?php if(!empty($file['description'])) { ?>
                                <p class="text-gray-600 mb-4 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($file['description'])); ?></p>
                            <?php } ?>
                            <ul class="text-gray-500 text-xs space-y-1 mb-4">
                                <li><strong>Code:</strong> <?= htmlspecialchars($file['course_code']); ?> | <strong>Dept:</strong> <?= htmlspecialchars($file['department']); ?></li>
                                <li><strong>Level:</strong> <?= htmlspecialchars($file['level']); ?> | <strong>Term:</strong> <?= htmlspecialchars($file['term']); ?> | <strong>Year:</strong> <?= htmlspecialchars($file['year']); ?></li>
                                <li><strong>Batch:</strong> <?= htmlspecialchars($file['batch']); ?> | <strong>Semester:</strong> <?= htmlspecialchars($file['semester']); ?></li>
                                <li><strong>Type:</strong> <?= htmlspecialchars($file['file_type']); ?> | <strong>Exam:</strong> <?= htmlspecialchars($file['exam_type']); ?></li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-between text-gray-500 text-xs">
                            <span>Uploaded by <?= htmlspecialchars($file['first_name'].' '.$file['last_name']); ?> at <?= $file['uploaded_at']; ?></span>
                            <div class="space-x-4">
                                <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $file['uploaded_by']) { ?>
                                    <a href="delete_file.php?id=<?= $file['id']; ?>" onclick="return confirm('Are you sure you want to delete this file?')" class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                                <?php } ?>
                                <a href="download.php?id=<?= $file['id']; ?>" class="text-blue-600 hover:text-blue-800 font-semibold">Download</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="col-span-full text-gray-500">No files found.</p>
            <?php } ?>
        </section>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
