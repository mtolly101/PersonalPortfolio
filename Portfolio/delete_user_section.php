<?php
session_start();
if (!isset($_SESSION["userid"])) exit("Unauthorized");

$conn = new mysqli("localhost", "root", "root", "contact");

$userid = $_SESSION["userid"];
$table = $_GET["table"] ?? '';
$id = $_GET["id"] ?? '';

$allowed_tables = ['about_skills', 'publications', 'teaching', 'portfolio'];

if (!in_array($table, $allowed_tables)) {
    die("Invalid table.");
}

$stmt = $conn->prepare("DELETE FROM $table WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $userid);

if ($stmt->execute()) {
    header("Location: user_{$table}.php");
} else {
    echo "Delete failed.";
}
?>
