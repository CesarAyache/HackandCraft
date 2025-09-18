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
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    //above we are getting the data from the form and saving them into variable to insert in database

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND  `password` = ?"); //preparing to query from the database to find a matching email
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) { //if we found 1 row where it's true (the email and password mactch)
        session_start(); //start the session
        $user = $result->fetch_assoc(); //gets the data of the user and puts them in an associative array
        $_SESSION['id'] = $user['id']; //saving the ID of the user to access in other pages
        $_SESSION['email'] = $user['email']; //saving the email of the user to access in other pages 
        $_SESSION['name'] = $user['name']; //saving the name of the user to access in other pages 
        header("Location: ../html/homepage.html"); //redirect to homepage
    } else {
        echo "<script>
    window.location.href = '../html/index.html';
    alert('Invalid Credentials');
</script>";
    }

    $stmt->close();
}

$conn->close();

?>