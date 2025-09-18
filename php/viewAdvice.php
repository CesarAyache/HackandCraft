<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Advice</title>
    <link rel = "stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> <!-- this is for the view profile icon-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="../script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
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
    </header>
<h1 style="text-align:center;">All Advice</h1>
<div style="display: flex; justify-content: center; align-items: center;">
<button id="submitButton" style="width:auto; background-color: #4CAF50;  color: white; font-size: 25px; border: none;  border-radius: 5px; cursor: pointer; ">Show All Advice</button> <!-- Button to trigger the AJAX request -->
</div>

<div id="advice-list"></div> <!-- This is where we will display the advice -->

<script> // jQuery and AJAX script -->
    $(document).ready(function() { // function to load advice via AJAX
        function loadAdvice() {
            $.ajax({
                url: 'getAdvice.php', //we want to take the data from getAdvice.php
                type: 'GET', //we use the "GET" bcz we want to retreive the data and not submit
                success: function(data) { 
                    $('#advice-list').html(data); //we place the data from getAdvice.php in viewAdvice.php
                },
            });
        }
        $('#submitButton').click(function() { //when the button is clicked we call the loadAdvice function
            loadAdvice(); // call the function to load the advice
        });
    });
</script>

</body>
</html>
