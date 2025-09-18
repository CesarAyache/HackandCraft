<?php
session_start();
$servername = "localhost";
$username = "root"; //default username
$password = "C706896&esar"; //password of SQL
$dbName = "hack_and_craft"; //name of database

$conn = new mysqli($servername, $username, $password, $dbName); //establish the connection with the database

$id = $_GET['id']; //get the id from the previous <a> tag

$stmt = $conn->prepare("SELECT * FROM tutorials WHERE id = ?"); //do a query to get the row 
$stmt->bind_param("d", $id); //put the parametes instead of question mark
$stmt->execute(); //execute the query

$result = $stmt->get_result(); //get the results of the query (mostly one row since ID is primary key)

$row=$result->fetch_assoc(); //get the values of the attributes of the tutorial and store them inside row

$image = $row['image'];
$title = $row['title'];
$type = $row['type'];
$desc = $row['description'];
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>About Us| DIY Tutorials</title>
        <link rel = "stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> <!-- this is for the view profile icon-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="../script.js"></script>
    </head>
    
    <body>
        <header class="header">
            <h1 id="title">Hack and Craft </h1> <!-- This is the head of the page with a description beneath it-->
            <h4 id="desc">DIY Tutorial</h4>
            <div class="profile-icon">
                <a href="../php/viewProfile.php" title="Login / Sign Up">
                  <i class="fas fa-user-circle"></i>
                  <span>View Profile</span>
                </a>
              </div>
        <nav>
            <button id="menu-btn" onclick="toggleMenu(event)">☰</button>
            <ul class="nav-links">
                <li><a href="../html/homePage.html">Home</a></li>
                <li><a href="../html/tutorials.html">Tutorials</a></li>
                <li><a href="../html/gallery.html">Gallery</a></li>
                <li><a href="../html/blog.html">Blog</a></li>
                <li><a href="../html/about.html">About</a></li>
                <li><a href="../html/contact.html">Contact</a></li>
                <li><a href="../html/FAQs.html">FAQs</a></li>
            </ul>
        </nav>
        <h1 style="text-align: center"><?php echo $title ?></h1>
        <br>
        <img src = "<?php echo $image?>" style="width:40%; height:auto; display:block; margin:auto">
        <br>
        <h2 style="text-align:center">Type: <?php echo $type?></h2>
        <br>
        <h3 style="text-align:center">Description<br><?php echo $desc?> </h3>
</body>
</html>
