<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../Portfolio/images/mlogo.png">
    <title>
        MRT• Personal Portfolio
      </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
    <?php if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1): ?>
        <li><a href="admin.php">Admin Panel</a></li>
    <?php endif; ?>
</head>
<body>
<div id="header">
    <div class="container">
        <nav>
            <h1>MRT• Personal Portfolio</h1></a>
            <?php session_start(); ?>
            <ul id="sidemenu">
                <li><a href="#header">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="publications.php">Publications</a></li>
                <li><a href="teaching.php">Teaching</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
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
        <div class="header-text">
            <p>MRT</p>
            <h1>A Personal Portfolio</h1>
        </div>
    </div>
</div>
<!--About Section-->
<div id="about">
    <div class="container">
        <div class="row">
            <?php
            $conn = new mysqli("localhost", "root", "root", "contact");

            $sql = "SELECT image FROM about_image WHERE user_id = 1";
            $result = $conn->query($sql);

            $imagePath = "../Portfolio/images/user.png"; // default fallback image

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (!empty($row['image'])) {
                    $imagePath = $row['image'];
                }
            }
            ?>
            <div class="about-col-1">
                <img src="<?= htmlspecialchars($imagePath) ?>" alt="Admin Image">
                <?php if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1): ?>
                <a href="edit_about_image.php">Edit Profile Image</a>
                <?php endif; ?>
            </div>
            <div class="about-col-2">
                <h1 class="subtitle">About Me</h1>
                <p>Willamette University student</p>
                <div class="tab-titles">
                    <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                    <p class="tab-links" onclick="opentab('experience')">Experience</p>
                    <p class="tab-links" onclick="opentab('education')">Education</p>
                </div>
                <div class="tab-contents active-tab" id="skills">
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
                    $sql = "SELECT * FROM about_skills WHERE user_id = 1";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "
                            <ul>
                                <li><span>{$row['name']}</span><br>{$row['description']}</li>
                            </ul>
                        ";
                        if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                            echo "
                                <br>
                                <a href='edit.php?table=about_skills&id={$row['id']}'>Edit</a> |
                                <a href='delete.php?table=about_skills&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                            ";
                        }
                    }
                    } else {
                    echo "<p>No skills found.</p>";
                    }
                    if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                        echo "<br><a href='add_about_admin.php?table=about_skills' class='btn'>+ Add New Skill</a>";
                    }
                        $conn->close();
                ?>
                </div>
                <div class="tab-contents" id="experience">
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
                    $sql = "SELECT * FROM about_experience WHERE user_id = 1";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "
                            <ul>
                                <li><span>{$row['date']}</span><br><strong>{$row['name']}</strong>
                                    <br>{$row['skill1']}
                                    <br>{$row['skill2']}
                                    <br>{$row['skill3']}
                                    <br>{$row['skill4']}
                                </li>
                            </ul>
                        ";
                        if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                            echo "
                                <br>
                                <a href='edit.php?table=about_experience&id={$row['id']}'>Edit</a> |
                                <a href='delete.php?table=about_experience&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                            ";
                        }
                    }
                    } else {
                    echo "<p>No experience found.</p>";
                    }
                    if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                        echo "<br><a href='add_about_admin.php?table=about_experience' class='btn'>+ Add New Experience</a>";
                    }

                        $conn->close();
                ?>
                </div>
                <div class="tab-contents" id="education">
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
                    $sql = "SELECT * FROM about_education WHERE user_id = 1";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "
                            <ul>
                                <li><span>{$row['date']}</span><br><strong>{$row['name']}</strong>
                                    <br>{$row['education1']}
                                    <br>{$row['education2']}
                                    <br>{$row['education3']}
                                </li>
                            </ul>
                        ";
                        if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                            echo "
                                <br>
                                <a href='edit.php?table=about_education&id={$row['id']}'>Edit</a> |
                                <a href='delete.php?table=about_education&id={$row['id']}' onclick=\"return confirm('Delete this item?');\">Delete</a>
                            ";
                        }
                    }
                    } else {
                    echo "<p>No education found.</p>";
                    }
                    if (isset($_SESSION["userlevel"]) && $_SESSION["userlevel"] == 1) {
                        echo "<br><a href='add_about_admin.php?table=about_education' class='btn'>+ Add New Education</a>";
                    }

                        $conn->close();
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact -->
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="subtitle">Contact Me</h1>
                <p><i class="fa-solid fa-paper-plane"></i> mallorytolliver@gmail.com</p>
                <p><i class="fa-solid fa-phone"></i> (614) 312 - 6754</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/profile.php?id=100069362482541"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/mallory-tolliver-b2638a2b8/"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/mallorytolliver/"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <a href="../Portfolio/images/Mallory T 2025 Resume-2.docx.pdf" download class="btn btn2">Download CV</a>
            </div>
            <div class="contact-right">
                <form method="POST" action="process.php">
                    <input type="text" name="name" id="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" rows="6" placeholder="Message" required></textarea>
                    <?php
                        if(!empty($successMessage)){
                         echo "
                            <div class='contact-right'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>    
                        ";
                        }
                    ?>
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright © Mallory <i class="fa-solid fa-heart"></i></p>
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
<script src="js/bootstrap.min.js"> </script>
<script src="js/bootstrap.js"> </script>
</html>