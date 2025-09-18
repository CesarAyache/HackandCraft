<?php
$servername = "localhost";
$username = "root"; // The default username 
$password = "C706896&esar"; // The password we put
$dbname = "hack_and_craft"; // The name of the database we used 

// Create connection between php and the database 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection and die if it failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //The session of the user is destroyed
    session_destroy();
    // The user is redirected to the login page 
    header("Location: ../html/index.html");
    exit();
}
?>