<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input data
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)) {
        echo 'Please fill in all fields.';
        exit;
    }

    // Check if username or email already exists in database
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo 'Username or email already exists.';
        exit;
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $query = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $password_hash);
    if (mysqli_stmt_execute($stmt)) {
        echo 'Signup successful!';
    } else {
        echo 'Error: ' . mysqli_error($db);
    }
}