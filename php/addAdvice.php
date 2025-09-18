<?php 
session_start();
$servername = "localhost";
$username = "root"; //default username
$password = "C706896&esar"; //password we put in SQL
$dbname = "hack_and_craft"; //name of the database

$conn = new mysqli($servername, $username, $password, $dbname); //connect with the existing database

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $advice = $_POST['advice'];
    $id = $_SESSION['id'];
    //take the variables from the POST request of addAdvice.html

    $stmt = $conn->prepare("INSERT INTO advice (name, advice, user_id) VALUES (?,?,?)");
    $stmt->bind_param("ssd", $name, $advice, $id);
    $stmt->execute();

    echo "<script>window.alert('The advice has been added successfully');  window.location.href = '../html/addAdvice.html';</script>";
    $stmt->close();
    $conn->close();
}


?>