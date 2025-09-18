<?php
session_start();
$password = "C706896&esar"; // The password we put

$conn = new mysqli('localhost', 'root', $password, 'hack_and_craft');

if (isset($_GET['tutorial_id'])) {
    $tutorial_id = intval($_GET['tutorial_id']);
    $user_id = $_SESSION['id']; 

    $sql = "SELECT rating FROM ratings WHERE tutorial_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $tutorial_id, $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "rated"; // the user already rated
    } else {
        echo "not rated"; // the user did not rate yet
    }
} else {
    echo "Invalid request.";
}
?>