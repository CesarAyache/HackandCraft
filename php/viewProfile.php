<?php
session_start();

$email = $_SESSION['email'];
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>DIY Solar Charger - DIY Tutorials</title>
    <link rel = "stylesheet" href="../style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="../script.js"></script>
</head>

<body>
    <header>
        <h1 id="title">Hack and Craft </h1> <!-- This is the head of the page with a description beneath it-->
        <h4 id="desc">DIY Tutorial</h4>
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
                <!--This is the navigation bar in the form of an unordered list where the elements link to other components of the project-->
            </ul>
        </nav>
        <div class="profile-info">
            <table>
              <tr>
                <th>Field</th>
                <th>Information</th>
              </tr>
              <tr>
                <td>Name</td>
                <td><?php echo $name; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php echo $email ?> </td>
              </tr>
              <tr>
                <td>Status</td>
                <td>Active</td>
              </tr>
            </table>
        </div>
        <div class="ViewProfileButtons">
            <form action="../php/logout.php" method="POST">
              <input type="submit" value="Log Out">
            </form>
            <form action="../php/deleteAcc.php" method="POST">
              <input type="submit" value="Delete Account">
            </form>
          </div>
    </header>