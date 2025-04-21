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
    <title>Add New Project • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add New Project</h2>

    <form method="POST">
        <label>Project Name:
            <input type="text" name="name" placeholder="Project Name" required>
        </label><br><br>

        <label>Description:
            <textarea name="description" placeholder="Description" required></textarea>
        </label><br><br>

        <label>Image URL:
            <input type="text" name="image" placeholder="Image Path or URL" required>
        </label><br><br>

        <label>Link:
            <input type="text" name="link" placeholder="Link to Project" required>
        </label><br><br>

        <label>Icon:
            <input type="text" name="icon" placeholder="Icon">
        </label><br><br>

        <input type="submit" value="Add Project">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $conn = new mysqli("localhost", "root", "root", "contact");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];

        $sql = "INSERT INTO portfolio (user_id, name, description, image, link, icon) 
                VALUES ('$user_id', '$name', '$description', '$image', '$link', '$icon')";

        if ($conn->query($sql) === TRUE) {
            header("Location: user_portfolio.php");
            exit();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <br><a href="user_portfolio.php">Back to Portfolio</a>
</div>
</body>
</html>
