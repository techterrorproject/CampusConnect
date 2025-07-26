<?php
include 'includes/functions.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    global $conn;
    $res = $conn->query("SELECT filename FROM files WHERE id=$id");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $filepath = 'uploads/' . $row['filename'];
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "No file ID provided.";
}
?>
