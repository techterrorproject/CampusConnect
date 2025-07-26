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

    return $conn->query("INSERT INTO users (first_name, last_name, email, department, password)
                  VALUES ('$fname', '$lname', '$email', '$dept', '$pass')");
}

function login($email, $password) {
    global $conn;
    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row;
            return true;
        }
    }
    return false;
}
?>
