<?php
include 'includes/functions.php';
if(!isset($_SESSION['user'])) header('Location: login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $filename);

    $title = $_POST['course_name'];
    $code = $_POST['course_code'];
    $dept = $_POST['department'];
    $semester = $_POST['semester'];
    $year = intval($_POST['year']);
    $level = $_POST['level'];
    $term = $_POST['term'];
    $batch = $_POST['batch'];
    $file_type = 'Question';  // fixed here
    $exam = $_POST['exam_type'];
    $desc = ''; // No description for questions (or can add if you want)
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
  <title>Upload Question - CampusConnect</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <h2>Upload Question</h2>
    <input name="course_name" required placeholder="Course Name">
    <input name="course_code" required placeholder="Course Code">
    <input name="department" required placeholder="Department">
    <select name="semester" required>
      <option value="Summer">Summer</option>
      <option value="Fall">Fall</option>
      <option value="Spring">Spring</option>
    </select>
    <input name="year" type="number" required placeholder="Year (e.g. 2025)">
    <input name="level" required placeholder="Level (e.g. 100, 200)">
    <input name="term" required placeholder="Term (e.g. 1, 2)">
    <input name="batch" required placeholder="Batch (e.g. 61, 62)">
    <select name="exam_type" required>
      <option value="quiz">Quiz</option>
      <option value="mid">Mid</option>
      <option value="final">Final</option>
    </select>
    <input type="file" name="file" required>
    <button type="submit">Upload Question</button>
  </form>
</div>
<footer>&copy; 2025 CampusConnect</footer>
</body>
</html>
