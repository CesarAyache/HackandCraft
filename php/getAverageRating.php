<?php

$servername = "localhost";
$username = "root"; // The default username 
$password = "C706896&esar"; // The password we put
$dbname = "hack_and_craft"; // The name of the database we used

if (isset($_GET['tutorial_id'])) {
    $tutorial_id = $_GET['tutorial_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', $password, 'hack_and_craft');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate average rating
    $sql = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE tutorial_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $tutorial_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return average rating
    echo round($row['avg_rating'], 1);

    $stmt->close();
    $conn->close();
}
?>
