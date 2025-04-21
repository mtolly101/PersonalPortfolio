<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Get current user ID
$user_id = $_SESSION["user_id"]; // Make sure you store this at login

?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($username) ?>'s Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION["username"]) ?>!</h1>
    <p>This is your dashboard. Here you can view and manage your own page content.</p>
    <hr>
    <ul>
        <li><a href="user_about.php">Edit About</a></li>
        <li><a href="user_publications.php">Edit Publications</a></li>
        <li><a href="user_teaching.php">Edit Teaching</a></li>
        <li><a href="user_portfolio.php">Edit Portfolio</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
