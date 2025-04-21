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
    <title>About • Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
</head>
<body>

<div id="about">
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
        <div class="row">
            <?php
            $user_id = $_SESSION['user_id'];
            $conn = new mysqli("localhost", "root", "root", "contact");

            $sql = "SELECT image FROM about_image WHERE user_id = $user_id";
            $result = $conn->query($sql);

            $imagePath = "../Portfolio/images/user.png"; // default fallback

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (!empty($row['image'])) {
                    $imagePath = $row['image'];
                }
            }
            ?>
            <div class="about-col-1">
                <img src="<?= htmlspecialchars($imagePath) ?>" alt="Profile Image">
                <a href="edit_about_image_user.php">Edit My Profile Image</a>
            </div>
            <div class="about-col-2">
                <h1 class="subtitle">About Me</h1>
                <p></p>

                <div class="tab-titles">
                    <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                    <p class="tab-links" onclick="opentab('experience')">Experience</p>
                    <p class="tab-links" onclick="opentab('education')">Education</p>
                </div>

                <!-- SKILLS -->
                <div class="tab-contents active-tab" id="skills">
                    <?php
                    $conn = new mysqli("localhost", "root", "root", "contact");
                    if ($conn->connect_error) die("Connection failed: ". $conn->connect_error);

                    $user_id = $_SESSION["user_id"];  // THIS IS IMPORTANT!

                    $sql = "SELECT * FROM about_skills WHERE user_id = $user_id";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<ul><li><span>{$row['name']}</span><br>{$row['description']}</li></ul>";
                            echo "<br><a href='edit.php?table=about_skills&id={$row['id']}'>Edit</a> |
                                  <a href='delete_user.php?table=about_skills&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>";
                        }
                    } else {
                        echo "<p>No skills found.</p>";
                    }
                    echo "<br><a href='add_about.php?table=about_skills' class='btn'>+ Add New Skill</a>";
                    ?>
                </div>

                <!-- EXPERIENCE -->
                <div class="tab-contents" id="experience">
                    <?php
                    $conn = new mysqli("localhost", "root", "root", "contact");
                    if ($conn->connect_error) die("Connection failed: ". $conn->connect_error);

                    $user_id = $_SESSION["user_id"];  // THIS IS IMPORTANT!

                    $sql = "SELECT * FROM about_experience WHERE user_id = $user_id";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<ul>
                                <li><span>{$row['date']}</span><br><strong>{$row['name']}</strong><br>
                                {$row['skill1']}<br>{$row['skill2']}<br>{$row['skill3']}<br>{$row['skill4']}
                                </li>
                            </ul>";
                            echo "<br><a href='edit.php?table=about_experience&id={$row['id']}'>Edit</a> |
                                  <a href='delete_user.php?table=about_experience&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>";
                        }
                    } else {
                        echo "<p>No experience found.</p>";
                    }
                    echo "<br><a href='add_about.php?table=about_experience' class='btn'>+ Add New Experience</a>";
                    ?>
                </div>

                <!-- EDUCATION -->
                <div class="tab-contents" id="education">
                    <?php
                    $conn = new mysqli("localhost", "root", "root", "contact");
                    if ($conn->connect_error) die("Connection failed: ". $conn->connect_error);

                    $user_id = $_SESSION["user_id"];  // THIS IS IMPORTANT!
                    $sql = "SELECT * FROM about_education WHERE user_id = $user_id";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<ul>
                                <li><span>{$row['date']}</span><br><strong>{$row['name']}</strong><br>
                                {$row['education1']}<br>{$row['education2']}<br>{$row['education3']}
                                </li>
                            </ul>";
                            echo "<br><a href='edit.php?table=about_education&id={$row['id']}'>Edit</a> |
                                  <a href='delete_user.php?table=about_education&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>";
                        }
                    } else {
                        echo "<p>No education found.</p>";
                    }
                    echo "<br><a href='add_about.php?table=about_education' class='btn'>+ Add New Education</a>";
                    $conn->close();
                    ?>
                </div>

            </div>
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
</body>
</html>