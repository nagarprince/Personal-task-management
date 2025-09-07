<?php
include "db.php"; // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match'); window.location.href='register.html';</script>";
        exit();
    }

    // Hash password
    $passwordHash = md5($password);

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Email already registered'); window.location.href='register.html';</script>";
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$passwordHash')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful'); window.location.href='login.html';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
