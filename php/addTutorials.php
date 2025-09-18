<?php
session_start();
$servername = "localhost";
$username = "root"; //default username
$password = "C706896&esar"; //password we put in SQL
$dbname = "hack_and_craft"; //name of the database

$conn = new mysqli($servername, $username, $password, $dbname); //connect with the existing database

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $title = $_POST['title'];
    $type = $_POST['tutInfo'];
    $desc = $_POST['description'];
    $id = $_SESSION['id'];
    //take the variables from the request 

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageFolder = "../uploads/"; 
    $imagePath = $imageFolder . basename($imageName);
    //process the image by taking its name and getting it path + also putting it in the uploads folder

    move_uploaded_file($imageTmpName, $imagePath);
    //move the image to the folder of uploads 

    $stmt = $conn->prepare("INSERT INTO tutorials (title, type, description, image, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $title, $type, $desc, $imagePath, $id); //bind the paramaters to the previous query
    $stmt -> execute();

    echo "<script>window.alert('The tutorial has been added successfully');  window.location.href = '../html/gallery.html';</script>";
    $stmt->close();
    $conn->close();
}
?>