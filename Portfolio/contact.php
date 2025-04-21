<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact• Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/bf1f97d80d.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Contact -->
 <div id="contact">
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
</body>
</html>