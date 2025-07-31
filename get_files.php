<?php
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
$sql = "SELECT f.*, u.first_name, u.last_name FROM files f JOIN users u ON f.uploaded_by = u.id $whereClause ORDER BY f.uploaded_at DESC";
$res = $conn->query($sql);

while ($file = $res->fetch_assoc()): ?>
  <div class="card">
    <h3><?= htmlspecialchars($file['course_title']) ?></h3>
    <?php if(!empty($file['description'])): ?>
      <p><?= nl2br(htmlspecialchars($file['description'])) ?></p>
    <?php endif; ?>
    <small>
      Code: <?= htmlspecialchars($file['course_code']) ?> | Dept: <?= htmlspecialchars($file['department']) ?><br>
      Level: <?= htmlspecialchars($file['level']) ?> | Term: <?= htmlspecialchars($file['term']) ?> | Year: <?= htmlspecialchars($file['year']) ?><br>
      Batch: <?= htmlspecialchars($file['batch']) ?> | Semester: <?= htmlspecialchars($file['semester']) ?><br>
      Type: <?= htmlspecialchars($file['file_type']) ?> | Exam: <?= htmlspecialchars($file['exam_type']) ?><br>
      Uploaded By: <?= htmlspecialchars($file['first_name'] . ' ' . $file['last_name']) ?> at <?= $file['uploaded_at'] ?>
    </small>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $file['uploaded_by']): ?>
      <br><a href="delete_file.php?id=<?= $file['id'] ?>" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
    <?php endif; ?>
    <br><a href="download.php?id=<?= $file['id'] ?>">Download</a>
  </div>
<?php endwhile; ?>
