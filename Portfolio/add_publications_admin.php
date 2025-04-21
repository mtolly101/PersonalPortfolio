<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Force Admin
$user_id = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Publication (Admin) • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Publication (Admin)</h2>
    <form method="POST">
        <label>Name: <input type="text" name="name" placeholder="Name" required></label><br><br>
        <label>Description: <textarea name="description" placeholder="Description" required></textarea></label><br><br>
        <label>Link: <input type="text" name="link" placeholder="Link" required></label><br><br>
        <label>Icon: <input type="text" name="icon" placeholder="Icon"></label><br><br>
        <input type="submit" value="Add Entry">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $conn = new mysqli("localhost", "root", "root", "contact");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $name = $_POST["name"];
        $description = $_POST["description"];
        $link = $_POST["link"];
        $icon = $_POST["icon"];

        $sql = "INSERT INTO publications (user_id, name, description, link, icon)
                VALUES ('$user_id', '$name', '$description', '$link', '$icon')";

        if ($conn->query($sql) === TRUE) {
            header("Location: publications.php");
            exit();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
        $conn->close();
    }
    ?>

    <br><a href="publications.php">Back to Publications</a>
</div>
</body>
</html>
