<?php
include 'includes/functions.php';
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id']);
$uid = $_SESSION['user']['id'];

global $conn;
$res = $conn->query("SELECT filename, uploaded_by FROM files WHERE id=$id LIMIT 1");
if ($res->num_rows === 0) {
    die("File not found.");
}

$file = $res->fetch_assoc();
if ($file['uploaded_by'] != $uid) {
    die("Unauthorized access.");
}

$filepath = "uploads/" . $file['filename'];
if (file_exists($filepath)) unlink($filepath);

$conn->query("DELETE FROM files WHERE id=$id");

header('Location: index.php');
exit;
?>
