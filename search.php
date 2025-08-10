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
                    <div class="card">
                        <h3><?php echo htmlspecialchars($file['course_title']); ?></h3>
                        <?php if(!empty($file['description'])) { ?>
                            <p><?php echo nl2br(htmlspecialchars($file['description'])); ?></p>
                        <?php } ?>
                        <small>
                            Code: <?php echo htmlspecialchars($file['course_code']); ?> |
                            Dept: <?php echo htmlspecialchars($file['department']); ?><br>
                            Level: <?php echo htmlspecialchars($file['level']); ?> |
                            Term: <?php echo htmlspecialchars($file['term']); ?> |
                            Year: <?php echo htmlspecialchars($file['year']); ?><br>
                            Batch: <?php echo htmlspecialchars($file['batch']); ?> |
                            Semester: <?php echo htmlspecialchars($file['semester']); ?><br>
                            Type: <?php echo htmlspecialchars($file['file_type']); ?> |
                            Exam: <?php echo htmlspecialchars($file['exam_type']); ?><br>
                            Uploaded By: <?php echo htmlspecialchars($file['first_name'].' '.$file['last_name']); ?> at <?php echo $file['uploaded_at']; ?>
                        </small>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $file['uploaded_by']) { ?>
                            <br><a href="delete_file.php?id=<?php echo $file['id']; ?>" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
                        <?php } ?>
                        <br><a href="download.php?id=<?php echo $file['id']; ?>">Download</a>
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
