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
    $name = $_POST['name'] ;
    $email = $_POST['email'];
    $ageRange = $_POST['ageRange'];
    $password = $_POST['password'];
    //above we are getting the data from the form and saving them into variable to insert in database

    $stmt = $conn->prepare("INSERT INTO users (name, email, ageRange, password) VALUES (?, ?, ?, ?)"); //preparing to insert in the db
    $stmt->bind_param("ssss", $name, $email, $ageRange, $password); 

    if ($stmt->execute()) { //execute the insertion query and get whether it worked or not 
        session_start(); //start the session//gets the data of the user and puts them in an associative array
        $_SESSION['email'] = $email;  //saving the email of the user to access in other pages 
        $_SESSION['name'] = $name;
         $_SESSION['id'] = $conn->insert_id;; //retrieves the ID of the last inserted row
        header("Location: ../html/homepage.html"); // redirect to homepage 
        exit();  // stop further script execution
    } else {
        echo "Error: " . $stmt->error; // if the insertion did not work
    }

    // close both the statement and the connection
    $stmt->close();
    $conn->close();
}
?>