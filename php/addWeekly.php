<?php
session_start();

$servername = "localhost"; 
$username = "root"; //default username
$password = "C706896&esar"; //password for MySQL
$dbname = "hack_and_craft"; //name of database

$conn = new mysqli($servername, $username, $password, $dbname); //connect to the database


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_FILES['weekly_image']['name']; //image file name
    $image_tmp = $_FILES['weekly_image']['tmp_name']; //temp location of the uploaded image
    $target_dir = "../uploads/"; //directory to save the uploaded image
    $target_file = $target_dir . basename($image); //full path of the uploaded file

    move_uploaded_file($image_tmp, $target_file);  //move the uploaded file to the desired directory

    $conn->query("INSERT INTO weekly_projects (title, image) VALUES ('$title', '$image')");
    echo "<script>window.alert('Weekly project been added successfully');  window.location.href = '../html/weekly.html';</script>";
}

$conn->close();
?>