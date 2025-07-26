<?php
$conn = new mysqli("localhost", "root", "", "campusconnect");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
