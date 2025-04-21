<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Force insert for admin user
$user_id = 1;

$table = $_GET['table'] ?? '';

function input($name, $placeholder = '', $type = 'text') {
    return "<label>$name: <input type='$type' name='$name' placeholder='$placeholder' required></label><br><br>";
}

function text_area($name, $placeholder = '') {
    return "<label>$name: <textarea name='$name' placeholder='$placeholder' required></textarea></label><br><br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New About • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Entry to <?= htmlspecialchars($table) ?></h2>
    <form method="POST">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $conn = new mysqli("localhost", "root", "root", "contact");

            if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

            if ($table === "about_skills") {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $sql = "INSERT INTO about_skills (user_id, name, description) VALUES ('$user_id', '$name', '$description')";
            } elseif ($table === "about_experience") {
                $name = $_POST["name"];
                $date = $_POST["date"];
                $skill1 = $_POST["skill1"];
                $skill2 = $_POST["skill2"];
                $skill3 = $_POST["skill3"];
                $skill4 = $_POST["skill4"];
                $sql = "INSERT INTO about_experience (user_id, name, date, skill1, skill2, skill3, skill4) 
                        VALUES ('$user_id', '$name', '$date', '$skill1', '$skill2', '$skill3', '$skill4')";
            } elseif ($table === "about_education") {
                $name = $_POST["name"];
                $date = $_POST["date"];
                $education1 = $_POST["education1"];
                $education2 = $_POST["education2"];
                $education3 = $_POST["education3"];
                $sql = "INSERT INTO about_education (user_id, name, date, education1, education2, education3) 
                        VALUES ('$user_id', '$name', '$date', '$education1', '$education2', '$education3')";
            }

            if (isset($sql) && $conn->query($sql) === TRUE) {
                echo "<p>New entry added successfully. <a href='about.php'>Back to About</a></p>";
                exit();
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
            $conn->close();
        }

        // Show form fields
        if ($table === "about_skills") {
            echo input("name", "Skill name");
            echo text_area("description", "Skill description");
        } elseif ($table === "about_experience") {
            echo input("name", "Experience title");
            echo input("date", "ex. Summer 2024");
            echo input("skill1", "Skill 1");
            echo input("skill2", "Skill 2");
            echo input("skill3", "Skill 3");
            echo input("skill4", "Skill 4");
        } elseif ($table === "about_education") {
            echo input("name", "School");
            echo input("date", "ex. 2018 - 2022");
            echo input("education1", "Detail 1");
            echo input("education2", "Detail 2");
            echo input("education3", "Detail 3");
        } else {
            echo "<p>Unknown section.</p>";
            exit();
        }
        ?>
        <input type="submit" value="Add Entry">
    </form>
    <br>
    <a href="about.php">Back to About</a>
</div>
</body>
</html>
