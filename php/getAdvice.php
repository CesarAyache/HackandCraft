<?php
session_start();

$servername = "localhost";
$username = "root"; //default username
$password = "C706896&esar"; //password for MySQL
$dbname = "hack_and_craft"; //password for database

$conn = new mysqli($servername, $username, $password, $dbname); //connect to database

$result = $conn->query("SELECT advice.*, users.name AS user_name FROM advice INNER JOIN users ON advice.user_id = users.id"); //fetch all the advice 

$adviceHtml = ''; //initialize to save content in HTML format

if ($result->num_rows > 0) { //check that we have at least one advice
    while ($row = $result->fetch_assoc()) {
        $adviceHtml .= '<div class="blog">';
        $adviceHtml .= '<p>' . $row['name']. '</p><br>';
        $adviceHtml .= '<p>' . $row['advice'] . '</p>';
        $adviceHtml .= '<p>-' . $row['user_name'] . '</p>';
        $adviceHtml .= '</div>'; //adding an item 
    }
} else {
    $adviceHtml .= '<p>No advice found.</p>'; //if no advice is found
}

$conn->close(); //close the connection

echo $adviceHtml; //return the HTML content through the "echo"
?>