<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Teaching Experience • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add New Teaching Experience</h2>

    <form method="POST">
        <label>Title:
            <input type="text" name="name" placeholder="Title" required>
        </label><br><br>

        <label>Description:
            <textarea name="description" placeholder="Description" required></textarea>
        </label><br><br>

        <label>Link:
            <input type="text" name="link" placeholder="Link to resource or project">
        </label><br><br>

        <label>Icon:
            <input type="text" name="icon" placeholder="Icon">
        </label><br><br>

        <input type="submit" value="Add Teaching Experience">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $conn = new mysqli("localhost", "root", "root", "contact");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];

        $sql = "INSERT INTO teaching (user_id, name, description, link, icon) 
                VALUES ('$user_id', '$name', '$description', '$link', '$icon')";

        if ($conn->query($sql) === TRUE) {
            header("Location: user_teaching.php");
            exit();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <br><a href="user_teaching.php">Back to Teaching</a>

</div>

</body>
</html>
