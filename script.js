function validateForm() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    if (email === "" || password === "") {
        alert("Please fill in all fields.");
    } 
    else{
        window.location.href="../html/homePage.html"
    }
}
//In the above function we are validating that the user did not leave any empty fields (password and email)
//if they did there will be an alert, otherwise they will be directed to homepage using the window.location.href="" 

function validateSignUp() {
    let email = document.getElementById("emailSign").value.trim();
    let password = document.getElementById("passSign").value.trim();
    let name = document.getElementById("nameSign").value.trim();
    let age = document.getElementById("ageSign").value.trim();
    if (email === "" || password === "" || name==="" || age==="") {
        alert("Please fill in all fields.");
    } 
    else{
        window.location.href="../html/homePage.html"
    }
}
//In the above function we are validating that there are no empty fields (password, email, name, and age)
//If all of them were filled then the user will be able to enter the homepage through the windows.location.href=""

function toggleMenu() {
    let nav = document.querySelector(".nav-links"); 
    if (nav.style.display === "block") {
        nav.style.display = "none";
    } else {
        nav.style.display = "block";
    }
}
//In the above function we use it for smaller screens specifically when there is a button that has to be clicked in order to see the 
//navigation bar since it does not fit in the screen. So, we select the first element of the navigation bar through the querySelector
//afterwards we check if the navigation bar is visible. IF YES, we hide it (first condition). ELSE, we make it visible to the user

function addImage() {
    let input = document.getElementById('imageInput');
    let gallery = document.getElementById('gallery');

    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function(e) {
            let img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('gallery-img');
            gallery.appendChild(img);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
//In the addImage() function we want to add the files/pictures that the user is entering in the gallery.html page. First we select the 
//input that the user has entered and also the <div> tag which we will display the images in. we check first to see that the user did
//not put any empty elements and then we initiate a filereader to access/read the image. Then we fire the function (function(e)) which
//is an event listener that is fired when the file is successfully read. Then we create an <img> tag which we set its URL/src to the image
//then we link it to its CSS and insert it in the div tag assigned for it

function goToPage(){
    window.location.href="../html/addAdvice.html";
}
//This is used in the blog.html page to go to the addAdvice.html page when the button is clicked

function goToBlog(){
    alert("Your message has been shared! Redirecting to blog...");
    window.location.href="../html/blog.html";
}
//This is used to return to the blog.html page from the addAdvice.html page after the user has submitted their advice

function updateMessage() {
    const total = document.querySelectorAll(".materialsTable input[type='checkbox']").length; 
    const checked = document.querySelectorAll(".materialsTable input[type='checkbox']:checked").length;
    const progress = (checked / total) * 100;
    let message = "";
    if (total === 0) {
        message = "No materials needed! You're ready to go!";
    } else if (progress === 0) {
        message = "You haven't checked anything yet! Are you even crafting?";
    } else if (progress > 0 && progress <= 30) {
        message = "Just getting started! A few more checks to go!";
    } else if (progress > 30 && progress <= 60) {
        message = "You're making progress! Keep going! ";
    } else if (progress > 60 && progress < 100) {
        message = "Almost there! Just a few more materials left!";
    } else {
        message = "All set! Time to unleash your inner DIY master!";
    }
    const messageElement = document.getElementById("progressMessage");
    if (messageElement) {
        messageElement.textContent = message;
    }
}
//This function is used to display a message according to what the user has checked in the checkboxes (average). We start by selecting
//all the checkboxes which would give us a NodeList (similar to an array) and calculate the length which is the total number of checkboxes
//afterwards we get the ones that have been checked and their length and calculate the average being the ones checked/total * 100
//after that we use if/ else if/ else to decide what the message is (We can also use switch statement). After that, we selected the 
//<p> tag in the tutorial page and set its text to the corresponding message
//This function is fired in all the tutorial pages. 
