<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "contact";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$contact_id = "";
$name = "";
$email = "";
$message = "";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}
?>