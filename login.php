<?php
include('config.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password']; // Don't escape the password, as it will be hashed

    $query = "SELECT password FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_hash = $row['password'];

        if (password_verify($password, $stored_hash)) {
            // Login successful, redirect or handle as needed
            echo "<script>alert('Login Successful!');</script>";
            echo "<script>window.location.href='dashboard.php';</script>";
            exit;
        } else {
            // Login failed, display an error message
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
    } else {
        // No user found with that email, display an error message
        header("Location: loginv2.html?error=invalid_credentials");
    }
}