<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include "config.php";

$table = $_GET['table'];
$id = $_GET['id'];

// Get logged-in user's ID
$user_id = $_SESSION["user_id"];

// Security check — only delete if the row belongs to the logged-in user
$sql = "DELETE FROM `$table` WHERE id = $id AND user_id = $user_id";

if ($conn->query($sql)) {
    // Redirect back based on section
    if ($table == 'about_skills' || $table == 'about_experience' || $table == 'about_education') {
        header("Location: user_about.php");
    } elseif ($table == 'publications') {
        header("Location: user_publications.php");
    } elseif ($table == 'portfolio') {
        header("Location: user_portfolio.php");
    } elseif ($table == 'teaching') {
        header("Location: user_teaching.php");
    } else {
        header("Location: user_dashboard.php");
    }
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
