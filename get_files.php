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
    <h3><?= ($file['course_title']) ?></h3>
    <?php if(!empty($file['description'])): ?>
      <p><?= nl2br(($file['description'])) ?></p>
    <?php endif; ?>
    <small>
      Code: <?= ($file['course_code']) ?> | Dept: <?= ($file['department']) ?><br>
      Level: <?= ($file['level']) ?> | Term: <?= ($file['term']) ?> | Year: <?= htmlspecialchars($file['year']) ?><br>
      Batch: <?= ($file['batch']) ?> | Semester: <?= ($file['semester']) ?><br>
      Type: <?= ($file['file_type']) ?> | Exam: <?= ($file['exam_type']) ?><br>
      Uploaded By: <?= ($file['first_name'] . ' ' . $file['last_name']) ?> at <?= $file['uploaded_at'] ?>
    </small>

    <div>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $file['uploaded_by']): ?>
      <br><a href="delete_file.php?id=<?= $file['id'] ?>" onclick="return confirm('Are you sure you want to delete this file?')" class="bg-red-300 rounded-lg p-1">Delete</a>
    <?php endif; ?>
    <br>
    <a href="download.php?id=<?= $file['id'] ?>" class="bg-green-300 rounded-lg p-1 mt-5">Download</a>
    </div>
  </div>
<?php endwhile; ?>
