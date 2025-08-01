<?php 
    include 'db.php';

    if (session_status() === PHP_SESSION_NONE) session_start();

    function register($data) {
        global $conn;
        $fname = $conn->real_escape_string($data['first_name']);
        $lname = $conn->real_escape_string($data['last_name']);
        $email = $conn->real_escape_string($data['email']);
        $dept = $conn->real_escape_string($data['department']);
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);

        return $conn->query("INSERT INTO users (first_name, last_name, email, department, password) VALUES ('$fname', '$lname', '$email', '$dept', '$pass')");
}
?>
