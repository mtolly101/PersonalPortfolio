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
    <title>Edit About Image (Admin) • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit About Me Image (Admin)</h2>

    <form method="POST">
        <label>Image URL:
            <input type="text" name="image" placeholder="Paste Image URL" required>
        </label><br><br>

        <input type="submit" value="Save Image">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $conn = new mysqli("localhost", "root", "root", "contact");

        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $image = $_POST['image'];

        // Check if the user already has an image
        $check = $conn->query("SELECT * FROM about_image WHERE user_id = $user_id");

        if ($check->num_rows > 0) {
            $sql = "UPDATE about_image SET image='$image' WHERE user_id = $user_id";
        } else {
            $sql = "INSERT INTO about_image (user_id, image) VALUES ($user_id, '$image')";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: about.php"); // Admin page
            exit();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>

    <br><a href="about.php">Back to About</a>

</div>

</body>
</html>

