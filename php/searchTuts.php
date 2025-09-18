<?php
$servername = "localhost";
$username = "root"; //the default username
$password = "C706896&esar";     //the password for MySQL
$dbname = "hack_and_craft"; //database name

$conn = new mysqli($servername, $username, $password, $dbname); //connect to the database


$searchTerm = $_GET['search'] ?? ''; //we need to get the search term from the viewTutorials.php ajax function

$stmt = $conn->prepare("SELECT * FROM tutorials WHERE title LIKE ? OR description LIKE ?");
$searchParam = "%$searchTerm%"; //we need to change it and put that there are characters before and after it
$stmt->bind_param("ss", $searchParam, $searchParam); 
$stmt->execute(); //execute the query

$result = $stmt->get_result(); //get the result from the query

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { //here we want to only display all the rows that match the query which are similar to searchTerm
        echo "<div class='tutorial-card'>";
        echo "<a href='getTut.php?id=" . $row['id'] . "'>";
        echo "<img src='" . $row['image'] . "' alt='Tutorial Image'>";
        echo "</a>";
        echo "<h3>" . ($row['title']) . "</h3>";
        echo "</div>";
    } //changing the HTML of the <div> tag having the tutorials to show only those which are similar to search
} else {
    echo "<p>No tutorials found!</p>"; //if no results are found we show this statement
}

$conn->close(); //close the connection with the database
?>










