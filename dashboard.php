<?php
session_start();

// Handle guest login
if (isset($_GET['guest'])) {
    $_SESSION['name'] = "Guest User";
    $_SESSION['email'] = "guest@example.com"; // placeholder email for guest
}

// Redirect to login if no session exists
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$user_name = $_SESSION['name'];
$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TaskPilot Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>

  <div class="sidebar">
    <div class="logo-container">
      <h1>✔️ TaskPilot</h1>
    </div>
    <ul>
      <li class="active">Dashboard</li>
      <li>Projects</li>
      <li>Tasks</li>
      <li>Settings</li>
    </ul>
  </div>

  <div class="main-content">
    <h2>Welcome, <?php echo $user_name; ?>!</h2>
    <p>Your email: <?php echo $user_email; ?></p>
    <p>Here you can manage your projects, tasks, and settings.</p>
    <a href="logout.php">Logout</a>
  </div>

</body>
</html>
