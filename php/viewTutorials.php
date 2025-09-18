<?php
session_start();
$servername = "localhost";
$username = "root"; //default username
$password = "C706896&esar"; //password we put in SQL
$dbname = "hack_and_craft"; //name of the database

//connect to the database:
$conn = new mysqli($servername, $username, $password, $dbname);

//now i want to query all the images and their titles and save them in a variable 'result' to display them
$query = "SELECT id, title, image FROM tutorials";
$result = $conn->query($query);
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

        <h2 id="galleryTitlee">View Others' Tutorials</h2><br>
        <input type="text" id="searchBar" placeholder="Search tutorials..." style="width: 300px; padding: 10px;" />
        <div id="userTuts">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="tutorial-card">
        <a href="getTut.php?id=<?php echo $row['id']; ?>">  
                <img src="<?php echo $row['image']; ?>" alt="Tutorial Image">
            </a>
            <h4><?php echo $row['title']; ?></h4>
        </div>
    <?php endwhile; ?>
        </div>

        <script>
    $('#searchBar').on('keyup', function() { //jquery to select the searchBar element and whenever I release a key the ajax function is called
        var searchTerm = $(this).val(); //I want to get the value of the "searchBar" using 'this'

        $.ajax({ //here ajax actually starts through jquery's ajax function
            url: 'searchTuts.php', //the php file i am sending the data to
            method: 'GET', //i want to get the data from searchTuts.php
            data: { search: searchTerm }, //I am sending the searchTerm to the php file
            success: function(response) { //on success (when I get a response) I want to change the tutorialsContainer and make it the response
                $('#userTuts').html(response); 
            }
        });
    });
</script>
    </body>
</html> 