<?php
session_start();
if (!isset($_SESSION["userlevel"]) || $_SESSION["userlevel"] != 1) {
    header("Location: index.php");
    exit();
}
?>

<body>
<h1>Welcome Admin!</h1>
<h2>Admin Panel</h2>
<ul>
    <li><a href="admin_users.php">Manage Users</a></li>
    <li><a href="index.php">Back to Home</a></li>
</ul>
<h2>Manage Content</h2>
<ul>
    <li><a href="about.php">Manage About</a></li>
    <li><a href="teaching.php">Manage Teaching</a></li>
    <li><a href="publications.php">Manage Publications</a></li>
    <li><a href="portfolio.php">Manage Portfolio</a></li>
</ul>
</body>



