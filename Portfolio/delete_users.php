<?php
session_start();
if (!isset($_SESSION["userlevel"]) || $_SESSION["userlevel"] != 1) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "root", "contact");
$id = $_GET["id"];

// Prevent deleting yourself
if ($_SESSION["user_id"] == $id) {
    echo "You cannot delete your own account.";
    exit();
}

$conn->query("DELETE FROM users WHERE user_id = $id");
header("Location: admin_users.php");
?>
