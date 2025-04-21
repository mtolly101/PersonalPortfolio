<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include "config.php";

$table = $_GET['table'];
$id = $_GET['id'];

$userlevel = $_SESSION["userlevel"];
$userid = $_SESSION["user_id"];

// Fetch current data
if ($userlevel == 1) {
    // Admin can edit anything
    $result = $conn->query("SELECT * FROM `$table` WHERE id = $id");
} else {
    // Regular user can only edit their own data
    $result = $conn->query("SELECT * FROM `$table` WHERE id = $id AND user_id = $userid");
}

$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found or you don't have access.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updates = [];
    foreach ($_POST as $key => $value) {
        $safeValue = $conn->real_escape_string($value);
        $updates[] = "`$key` = '$safeValue'";
    }
    $updateQuery = "UPDATE `$table` SET " . implode(", ", $updates) . " WHERE id = $id";

    if ($conn->query($updateQuery)) {
        if ($userlevel == 1) {
            header("Location: admin.php");
        } else {
            header("Location: user_about.php");
        }
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Show form
echo "<div class='container'>";
echo "<form method='POST'>";
foreach ($row as $key => $value) {
    if ($key == "id" || $key == "user_id") continue;  // don't let them edit id or user_id
    echo "<label>$key</label><br>";
    echo "<input type='text' name='$key' value='$value'><br><br>";
}
echo "<input type='submit' value='Save'>";
echo "</form>";
echo "</div>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


