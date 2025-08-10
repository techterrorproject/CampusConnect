<?php
include 'includes/functions.php';
if (!isset($_SESSION['user'])) header('Location: login.php');

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
    $file_type = 'Question';
    $exam = $_POST['exam_type'];
    $desc = '';
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
  <?php include 'includes/head.php'; ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

<div class="flex flex-1 items-center justify-center p-6">
  <form method="post" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl max-w-lg w-full p-8 space-y-6">
    <h2 class="text-3xl font-bold text-gray-800 text-center">Upload Question</h2>

    <input name="course_name" required placeholder="Course Name" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    <input name="course_code" required placeholder="Course Code" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    <input name="department" required placeholder="Department" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    
    <select name="semester" required class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="" disabled selected>Select Semester</option>
      <option value="Summer">Summer</option>
      <option value="Fall">Fall</option>
      <option value="Spring">Spring</option>
    </select>

    <input name="year" type="number" required placeholder="Year (e.g. 2025)" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    <input name="level" required placeholder="Level (e.g. 100, 200)" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    <input name="term" required placeholder="Term (e.g. 1, 2)" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    <input name="batch" required placeholder="Batch (e.g. 61, 62)" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    
    <select name="exam_type" required class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option value="" disabled selected>Select Exam Type</option>
      <option value="quiz">Quiz</option>
      <option value="mid">Mid</option>
      <option value="final">Final</option>
    </select>

    <input type="file" name="file" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
      Upload Question
    </button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
