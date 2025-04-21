<?php
include("config.php");

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    do{
        if(empty($name) || empty($email) || empty($message)){
            $errorMessage = "All fields are required";
            break;
        }

        // add new client to db
        $sql = "INSERT INTO contactme (name,email,message)"."VALUES ('$name','$email','$message')";
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: ".$conn->error;
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Client added correctly!";

        header("location: index.php");
        exit;

    } while(false);
}
?>