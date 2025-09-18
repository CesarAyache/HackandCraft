<?php
session_start();
$servername = "localhost";
$username = "root"; // The default username 
$password = "C706896&esar"; // The password we put
$dbname = "hack_and_craft"; // The name of the database we used
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get tutorial_id and rating
    $tutorial_id = $_POST['tutorial_id'];
    $rating = $_POST['rating'];
    $user_id = $_SESSION['id'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


$stmt = $conn->prepare("INSERT INTO ratings (tutorial_id, user_id, rating) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $tutorial_id, $user_id, $rating);

if ($stmt->execute()) {
echo "Rating saved successfully!";
} else {
echo "Error saving rating.";
}
} else {
echo "Invalid data.";
}

    $stmt->close();
    $conn->close();

?>
