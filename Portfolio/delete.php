<?php
session_start();
if (!isset($_SESSION["userlevel"]) || $_SESSION["userlevel"] != 1) {
    header("Location: login.php");
    exit();
}

include "config.php";

$table = $_GET['table'];
$id = $_GET['id'];

$sql = "DELETE FROM `$table` WHERE id = $id";
if ($conn->query($sql)) {
    header("Location: admin.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>

