<?php
include 'includes/functions.php';
if(!isset($_SESSION['user'])) header('Location: login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $filename);

    $title = $_POST['course_title'];
    $desc = $_POST['description'];
    $code = $_POST['course_code'];
    $dept = $_POST['department'];
    $batch = $_POST['batch'];
    $semester = $_POST['semester'];
    $year = intval($_POST['year']);
    $level = $_POST['level'];
    $term = $_POST['term'];
    $file_type = 'Note';  // fixed here
    $exam = $_POST['exam_type'];
    $uid = $_SESSION['user']['id'];

    global $conn;
    $stmt = $conn->prepare("INSERT INTO files (course_title, description, course_code, department, batch, semester, year, level, term, exam_type, file_type, filename, uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssisssssi', $title, $desc, $code, $dept, $batch, $semester, $year, $level, $term, $exam, $file_type, $filename, $uid);
    $stmt->execute();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Note - CampusConnect</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <h2>Upload Note</h2>
    <input name="course_title" required placeholder="Course Name">
    <input name="course_code" required placeholder="Course Code">
    <input name="description" required placeholder="Short description">
    <input name="department" required placeholder="Department">
    <input name="batch" required placeholder="Batch (e.g. 61, 62)">
    <select name="semester" required>
      <option value="Summer">Summer</option>
      <option value="Fall">Fall</option>
      <option value="Spring">Spring</option>
    </select>
    <input name="year" type="number" required placeholder="Year (e.g. 2025)">
    <input name="level" required placeholder="Level (e.g. 100, 200)">
    <input name="term" required placeholder="Term (e.g. 1, 2)">
    <select name="exam_type" required>
      <option value="quiz">Quiz</option>
      <option value="mid">Mid</option>
      <option value="final">Final</option>
    </select>
    <input type="file" name="file" required>
    <button type="submit">Upload Note</button>
  </form>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
