<?php
session_start();
include "db.php"; // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // hashed password

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        $user = $result->fetch_assoc();
        $_SESSION['name'] = $user['firstname'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.html';</script>";
        exit();
    }
}
?>
