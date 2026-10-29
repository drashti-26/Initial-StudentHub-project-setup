<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Hub Portal-25CS017 GONDHA DRASHTI DILIPKUMAR 94aa35</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
    background:#f2f2f2;
    transition:.3s;
}

/* Notification Banner */

#banner{
    background:#0d6efd;
    color:white;
    text-align:center;
    padding:12px;
    font-size:18px;
    font-weight:bold;
}

/* Header */

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 40px;
    background:#f4f4f4;
    gap:20px;
    position:sticky;
    top:0;
    z-index:100;
}

.header h2{
    flex:1;
    font-size:32px;
}

/* Navigation */

.links{
    flex:1;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
}

.links a{
    text-decoration:none;
    color:#222;
    font-size:18px;
    font-weight:bold;
    transition:.3s;
}

.links a:hover{
    color:#0d6efd;
}

/* Theme Button */

#themeBtn{
    padding:10px 18px;
    border:none;
    border-radius:6px;
    background:#0d6efd;
    color:white;
    cursor:pointer;
    font-size:15px;
    transition:.3s;
}

#themeBtn:hover{
    background:#084298;
}

/* Elegant Hamburger */

.menu-icon{
    display:none;
    width:48px;
    height:48px;
    background:#003366;
    border-radius:10px;
    cursor:pointer;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    gap:5px;
    transition:.3s;
    box-shadow:0 4px 10px rgba(0,0,0,.25);
}

.menu-icon span{
    width:24px;
    height:3px;
    background:white;
    border-radius:3px;
    transition:.3s;
}

.menu-icon:hover{
    background:#0d6efd;
    transform:scale(1.05);
}

/* Image Slider */

.slider{
    width:100%;
    height:calc(100vh - 95px);
    position:relative;
    overflow:hidden;
}

.slide{
    display:none;
    width:100%;
    height:100%;
}

.slide img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.active{
    display:block;
}

/* Caption */

.caption{
    position:absolute;
    bottom:40px;
    left:50%;
    transform:translateX(-50%);
    background:rgba(0,0,0,.55);
    color:white;
    padding:12px 25px;
    border-radius:8px;
    font-size:22px;
}

/* Dark Mode */

.dark{
    background:#121212;
    color:white;
}

.dark .header{
    background:#1f2937;
}

.dark .links a{
    color:#93c5fd;
}

.dark .links a:hover{
    color:white;
}

.dark #themeBtn{
    background:#2563eb;
}

.dark #themeBtn:hover{
    background:#1d4ed8;
}

.dark .menu-icon{
    background:#2563eb;
}

/* Mobile */

@media(max-width:768px){

.header{
    flex-direction:column;
    text-align:center;
}

.header h2{
    font-size:24px;
}

.menu-icon{
    display:flex;
}

.links{
    display:none;
    flex-direction:column;
    width:100%;
    gap:15px;
}

.links.show{
    display:flex;
}

.slider,
.slide{
    height:250px;
}

.caption{
    font-size:16px;
    padding:8px 15px;
}

}
</style>

</head>

<body>

<!-- Notification Banner -->

<div id="banner">
🎉 Welcome to the Student Hub Portal!
</div>

<!-- Header -->

<div class="header">

<h2>WELCOME TO THE STUDENT HUB PORTAL</h2>

<button id="themeBtn">
🌙 Dark Mode
</button>

<!-- Elegant Hamburger -->

<div class="menu-icon">

<span></span>
<span></span>
<span></span>

</div>

<!-- Navigation -->

<div class="links">

<a href="login.php">Login</a>

<a href="signup.php">Signup</a>

<a href="events.php">Events</a>

<a href="about.php">About Us</a>

<a href="contact.php">Contact Us</a>

</div>

</div>

<!-- Automatic Image Slider -->

<div class="slider">

<div class="slide active">

<img src="college1.jpeg" alt="College">

<div class="caption">
Welcome to Student Hub Portal
</div>

</div>

<div class="slide">

<img src="college2.jpg" alt="Campus">

<div class="caption">
Explore Campus Life
</div>

</div>

<div class="slide">

<img src="college3.jpg" alt="Library">

<div class="caption">
Learn • Grow • Achieve
</div>

</div>

<div class="slide">

<img src="college4.jpg" alt="Events">

<div class="caption">
Join Exciting College Events
</div>

</div>

</div>

<script>
    /* Notification Banner */

setTimeout(function(){

document.getElementById("banner").style.display="none";

},3000);


/* Elegant Hamburger Menu */

const menu=document.querySelector(".menu-icon");
const links=document.querySelector(".links");

menu.addEventListener("click",function(){

links.classList.toggle("show");

});


/* Dark / Light Mode */

const btn=document.getElementById("themeBtn");


btn.addEventListener("click",function(){

    document.body.classList.toggle("dark");


    if(document.body.classList.contains("dark")){

        localStorage.setItem("theme","dark");

        btn.innerHTML="☀ Light Mode";

    }
    else{

        localStorage.setItem("theme","light");

        btn.innerHTML="🌙 Dark Mode";

    }

});


// Load saved theme

let savedTheme = localStorage.getItem("theme");


if(savedTheme === "dark"){

    document.body.classList.add("dark");

    btn.innerHTML="☀ Light Mode";

}
else{

    document.body.classList.remove("dark");

    btn.innerHTML="🌙 Dark Mode";

}


/* Automatic Image Slider */

let slides=document.querySelectorAll(".slide");

let index=0;

function showSlides(){

for(let i=0;i<slides.length;i++){

slides[i].classList.remove("active");

}

index++;

if(index>slides.length){

index=1;

}

slides[index-1].classList.add("active");

}

setInterval(showSlides,3000);

</script>

</body>
</html>