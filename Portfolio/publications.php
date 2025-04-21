<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications• Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Services-->
<div id="services">
    <div class="container">
        <nav>
            <h1>MRT• Personal Portfolio</h1></a>
            <ul id="sidemenu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="publications.php">Publications</a></li>
                <li><a href="teaching.php">Teaching</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION["username"])): ?>
                    <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION["username"]) ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
                <i class="fas fa-times" onclick="closemenu()"></i>
            </ul>
            <i class="fas fa-bars" onclick="openmenu()"></i>
        </nav>
        <br><br><br><br><br><br><br>
        <h1 class="subtitle">Publications</h1>
        <div class='services-list'>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "contact";    

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            // Fetch all rows from table
            $sql = "SELECT * FROM publications WHERE user_id = 1";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "
                    <div>
                        <i class='{$row['icon']}'></i>
                        <h2>{$row['name']}</h2>
                        <p>{$row['description']}</p>
                        <a href='{$row['link']}'>Learn More</a>
                ";
                if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                    echo "
                        <br>
                        <a href='edit.php?table=publications&id={$row['id']}'>Edit</a> |
                        <a href='delete.php?table=publications&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                    ";
                }

                echo "</div>";
            }
            } else {
            echo "<p>No services found.</p>";
            }
            if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                echo "<br><a href='add_publications_admin.php?table=publications' class='btn'>+ Add New Publication</a>";
            }
                $conn->close();
            ?>

        </div>
    </div>
</div>
<div class="copyright">
    <p>Copyright © Mallory <i class="fa-solid fa-heart"></i></p>
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
</script>
<script>
    var sidemenu = document.getElementById("sidemenu");
    function openmenu(){
        sidemenu.style.right = "0";
    }
    function closemenu(){
        sidemenu.style.right = "-200px";
    }
</script>
<!-- for Willamette University Women's Golf -->
</body>
</html>