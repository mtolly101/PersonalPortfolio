<?php
session_start();
if (!isset($_SESSION["userid"])) exit("Unauthorized");

$conn = new mysqli("localhost", "root", "root", "contact");

$userid = $_SESSION["userid"];
$table = $_POST["table"];
$id = $_POST["id"];

$allowed_tables = ['about_skills', 'publications', 'teaching', 'portfolio'];

if (!in_array($table, $allowed_tables)) {
    die("Invalid table.");
}

if ($table === 'about_skills') {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $stmt = $conn->prepare("UPDATE $table SET name = ?, description = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ssii", $name, $description, $id, $userid);
} elseif ($table === 'publications') {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $link = $_POST["link"];
    $stmt = $conn->prepare("UPDATE $table SET name = ?, description = ?, link = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sssii", $name, $description, $link, $id, $userid);
}

if ($stmt->execute()) {
    header("Location: user_{$table}.php");
} else {
    echo "Update failed.";
}
?>