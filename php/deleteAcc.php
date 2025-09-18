<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "C706896&esar";
$databasename = "hack_and_craft";

$conn = new mysqli($servername, $username, $password, $databasename);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_SESSION["email"]; //get the user's email

    if($conn->query("DELETE FROM users WHERE email = '$email'") == TRUE){
        session_destroy(); // the user session should be destroyed
        header("Location: ../html/index.html"); // redirect to homepage
        exit();
    }
}

?>