<?php
session_start(); // Start the session before using $_SESSION
include 'includes/functions.php';

$type = $_GET['type'] ?? 'all';

$whereClause = '';
$params = [];
$types = '';

if ($type === 'Note') {
    $whereClause = "WHERE file_type = 'Note'";
} elseif ($type === 'Question') {
    $whereClause = "WHERE file_type = 'Question'";
}

global $conn;
$sql = "SELECT f.*, u.first_name, u.last_name 
        FROM files f 
        JOIN users u ON f.uploaded_by = u.id 
        $whereClause 
        ORDER BY f.uploaded_at DESC";
$res = $conn->query($sql);

while ($file = $res->fetch_assoc()): ?>
    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col justify-between border-l-4 border-blue-500">
        <div>
            <h3 class="text-xl font-bold mb-2 text-gray-800"><?= htmlspecialchars($file['course_title']) ?></h3>
            <?php if (!empty($file['description'])): ?>
                <p class="text-gray-600 mb-4 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($file['description'])) ?></p>
            <?php endif; ?>
            <ul class="text-gray-500 text-xs space-y-1 mb-4">
                <li><strong>Code:</strong> <?= htmlspecialchars($file['course_code']) ?> | 
                    <strong>Dept:</strong> <?= htmlspecialchars($file['department']) ?></li>
                <li><strong>Level:</strong> <?= htmlspecialchars($file['level']) ?> | 
                    <strong>Term:</strong> <?= htmlspecialchars($file['term']) ?> | 
                    <strong>Year:</strong> <?= htmlspecialchars($file['year']) ?></li>
                <li><strong>Batch:</strong> <?= htmlspecialchars($file['batch']) ?> | 
                    <strong>Semester:</strong> <?= htmlspecialchars($file['semester']) ?></li>
                <li><strong>Type:</strong> <?= htmlspecialchars($file['file_type']) ?> | 
                    <strong>Exam:</strong> <?= htmlspecialchars($file['exam_type']) ?></li>
            </ul>
        </div>

        <div class="flex items-center justify-between text-gray-500 text-xs">
            <span>Uploaded by <?= htmlspecialchars($file['first_name'] . ' ' . $file['last_name']) ?> 
                at <?= $file['uploaded_at'] ?></span>
            <div class="space-x-4">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $file['uploaded_by']): ?>
                    <a href="delete_file.php?id=<?= $file['id'] ?>" 
                       onclick="return confirm('Are you sure?')" 
                       class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                <?php endif; ?>
                <a href="download.php?id=<?= $file['id'] ?>" 
                   class="text-blue-600 hover:text-blue-800 font-semibold">Download</a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
