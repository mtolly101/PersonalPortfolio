<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teaching • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
</head>
<body>

<div id="services">
    <div class="container">
    <nav>
        <h1>Personal Portfolio</h1>
            <ul id="sidemenu">
                <li><a href="user_dashboard.php">Home</a></li>
                <li><a href="user_about.php">About</a></li>
                <li><a href="user_publications.php">Publications</a></li>
                <li><a href="user_teaching.php">Teaching</a></li>
                <li><a href="user_portfolio.php">Portfolio</a></li>
                <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION["username"]) ?></a></li>
                <li><a href="logout.php">Logout</a></li>
                <i class="fas fa-times" onclick="closemenu()"></i>
            </ul>
            <i class="fas fa-bars" onclick="openmenu()"></i>
        </nav>

        <h1 class="subtitle">Teaching</h1>

        <div class="services-list">
        <?php
        $conn = new mysqli("localhost", "root", "root", "contact");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM teaching WHERE user_id = $user_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div>
                    <i class='{$row['icon']}'></i>
                    <h2>{$row['name']}</h2>
                    <p>{$row['description']}</p>
                    <a href='{$row['link']}'>Learn More</a>
                    <br><br>
                    <a href='edit.php?table=teaching&id={$row['id']}'>Edit</a> |
                    <a href='delete_user.php?table=teaching&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                </div>
                ";
            }
        } else {
            echo "<p>No teaching experience found.</p>";
        }

        echo "<br><a href='add_teaching.php' class='btn'>+ Add New Teaching Experience</a>";

        $conn->close();
        ?>
        </div>
    </div>
</div>
<script>
var sidemenu = document.getElementById("sidemenu");
function openmenu(){
    sidemenu.style.right = "0";
}
function closemenu(){
    sidemenu.style.right = "-200px";
}
</script>

</body>
</html>
