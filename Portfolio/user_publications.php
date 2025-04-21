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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Services-->
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

        <br><br><br><br><br><br><br>
        <h1 class="subtitle">Publications</h1>

        <div class='services-list'>
        <?php
            $conn = new mysqli("localhost", "root", "root", "contact");

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            // Fetch ONLY this user's publications
            $sql = "SELECT * FROM publications WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div>
                            <i class='{$row['icon']}'></i>
                            <h2>{$row['name']}</h2>
                            <p>{$row['description']}</p>
                            <a href='{$row['link']}'>Learn More</a>
                            <br>
                            <a href='edit.php?table=publications&id={$row['id']}'>Edit</a> |
                            <a href='delete_user.php?table=publications&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                        </div>
                    ";
                }
            } else {
                echo "<p>No publications found.</p>";
            }

            echo "<br><a href='add_publications.php?table=publications' class='btn'>+ Add New Publication</a>";

            $conn->close();
        ?>
        </div>
    </div>
</div>
<script>
    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");
    function opentab(tabname){
        for(tablink of tablinks){
            tablink.classList.remove("active-link");
        }
        for(tabcontent of tabcontents){
            tabcontent.classList.remove("active-tab");
        }
        event.currentTarget.classList.add("active-link");
        document.getElementById(tabname).classList.add("active-tab");
    }

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

