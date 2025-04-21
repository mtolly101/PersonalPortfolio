<?php
session_start();
if (!isset($_SESSION["userid"])) exit("Not logged in");

$conn = new mysqli("localhost", "root", "root", "contact");
$userid = $_SESSION["userid"];
$table = $_POST["table"];

if ($table === "about_skills") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $stmt = $conn->prepare("INSERT INTO about_skills (name, description, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $desc, $userid);
    $stmt->execute();
    header("Location: user_about.php");
    exit();
}

if ($table === "about_experience") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $stmt = $conn->prepare("INSERT INTO about_experience (name, description, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $desc, $userid);
    $stmt->execute();
    header("Location: user_about.php");
    exit();
}

if ($table === "about_education") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $stmt = $conn->prepare("INSERT INTO about_education (name, description, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $desc, $userid);
    $stmt->execute();
    header("Location: user_about.php");
    exit();
}
?>
