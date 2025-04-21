<?php
session_start();
if (!isset($_SESSION["userlevel"]) || $_SESSION["userlevel"] != 1) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "root", "contact");
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $userlevel = $_POST["userlevel"];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, userlevel=? WHERE user_id=?");
    $stmt->bind_param("ssii", $username, $email, $userlevel, $id);
    $stmt->execute();
    header("Location: admin_users.php");
    exit();
}

$result = $conn->query("SELECT * FROM users WHERE user_id = $id");
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Users • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit User</h2>
        <form method="POST">
            Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>"><br>
            Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br>
            Role:
            <select name="userlevel">
                <option value="0" <?= $user['userlevel'] == 0 ? 'selected' : '' ?>>User</option>
                <option value="1" <?= $user['userlevel'] == 1 ? 'selected' : '' ?>>Admin</option>
            </select><br>
            <input type="submit" value="Update">
        </form>
</div>
