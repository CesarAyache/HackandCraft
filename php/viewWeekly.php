<?php
session_start();

$servername = "localhost"; 
$username = "root"; //default username
$password = "C706896&esar"; //password for MySQL
$dbname = "hack_and_craft"; //name of database

$conn = new mysqli($servername, $username, $password, $dbname); //connect to the database

//query to fetch all projects
$query = "SELECT * FROM weekly_projects ORDER BY id DESC"; 
$result = $conn->query($query);

$projectsHtml = ''; //initialize an empty string to store HTML content

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projectsHtml .= "
            <div class='project-item'>
                <img src='../uploads/{$row['image']}' alt='{$row['title']}' class='project-image'>
                <p><strong>Title:</strong> {$row['title']}</p>
                <p><strong>Uploaded by:</strong> {$_SESSION['name']}</p>
            </div>
        ";
    }
} else {
    $projectsHtml = "<p>No projects found.</p>";
}

echo $projectsHtml; //return the HTML content

$conn->close();
?>
