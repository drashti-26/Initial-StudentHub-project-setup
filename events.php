<!DOCTYPE html>
<html>
<head>

<title>Events - Student Hub Portal</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
    background:#f2f2f2;
    transition:0.3s;
}

h1{
    background:#003366;
    color:white;
    text-align:center;
    padding:20px;
}

h2{
    text-align:center;
    margin:30px 0;
    color:#003366;
}

/* ===========================
   Event Image Slider
=========================== */

.slider{
    width:95%;
    max-width:1100px;
    height:450px;
    margin:20px auto;
    position:relative;
    overflow:hidden;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.3);
}

.slide{
    display:none;
    width:100%;
    height:100%;
}

.slide.active{
    display:block;
}

.slide img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.caption{
    position:absolute;
    bottom:25px;
    left:50%;
    transform:translateX(-50%);
    background:rgba(0,0,0,0.6);
    color:white;
    padding:12px 25px;
    border-radius:8px;
    font-size:22px;
    font-weight:bold;
}

/* ===========================
   Responsive Table
=========================== */

.table-container{
    width:95%;
    max-width:1000px;
    margin:30px auto;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    min-width:600px;
}

th,td{
    border:1px solid #000;
    padding:12px;
    text-align:center;
}

th{
    background:#003366;
    color:white;
}

tr:nth-child(even){
    background:#f9f9f9;
}

/* ===========================
   Buttons
=========================== */

.buttons{
    display:flex;
    justify-content:center;
    gap:20px;
    margin:30px 0;
    flex-wrap:wrap;
}

button,
.home a{
    text-decoration:none;
    background:#003366;
    color:white;
    padding:12px 24px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover,
.home a:hover{
    background:#0055aa;
}

/* ===========================
   Home Button
=========================== */

.home{
    display:flex;
}

/* ===========================
   Modal
=========================== */

.modal{
    display:none;
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
}

.modal-content{
    background:white;
    width:90%;
    max-width:400px;
    margin:10% auto;
    padding:25px;
    border-radius:10px;
    text-align:center;
}

.close{
    float:right;
    font-size:24px;
    cursor:pointer;
}

/* ===========================
   Dark Mode
=========================== */

.dark{
    background:#121212;
    color:white;
}

.dark h2{
    color:#93c5fd;
}

.dark table{
    background:#1f2937;
    color:white;
}

.dark th{
    background:#2563eb;
}

.dark td{
    border:1px solid #555;
}

.dark tr:nth-child(even){
    background:#2d3748;
}

.dark .modal-content{
    background:#1f2937;
    color:white;
}

/* ===========================
   Mobile
=========================== */

@media(max-width:768px){

h1{
    font-size:28px;
}

h2{
    font-size:22px;
}

.slider{
    height:250px;
}

.caption{
    font-size:16px;
    padding:8px 15px;
}

th,td{
    padding:10px;
    font-size:14px;
}

}

</style>

</head>

<body>

<h1>Student Hub Portal</h1>

<h2>Upcoming College Events</h2>

<!-- Image Slider -->

<div class="slider">

<div class="slide active">

<img src="event1.jpg" alt="Orientation Program">

<div class="caption">
Orientation Program
</div>

</div>

<div class="slide">

<img src="event2.jpg" alt="Tech Fest">

<div class="caption">
Tech Fest 2026
</div>

</div>

<div class="slide">

<img src="event3.jpeg" alt="Sports Day">

<div class="caption">
Sports Day
</div>

</div>

<div class="slide">

<img src="event4.jpg" alt="Cultural Night">

<div class="caption">
Cultural Night
</div>

</div>

</div>
<!-- Events Table -->

<div class="table-container">

<table>

<tr>
<th>Event Name</th>
<th>Date</th>
<th>Time</th>
<th>Venue</th>
</tr>

<tr>
<td>Orientation Program</td>
<td>20 July 2026</td>
<td>10:00 AM</td>
<td>Main Auditorium</td>
</tr>

<tr>
<td>Tech Fest</td>
<td>05 August 2026</td>
<td>9:30 AM</td>
<td>Seminar Hall</td>
</tr>

<tr>
<td>Sports Day</td>
<td>18 August 2026</td>
<td>8:00 AM</td>
<td>College Ground</td>
</tr>

<tr>
<td>Cultural Night</td>
<td>30 August 2026</td>
<td>6:00 PM</td>
<td>Open Air Theatre</td>
</tr>

</table>

</div>

<!-- Buttons -->

<div class="buttons">

<button id="eventBtn">

Event Guidelines

</button>

<div class="home">

<a href="home.php">

← Back to Home

</a>

</div>

</div>

<!-- Modal -->

<div id="eventModal" class="modal">

<div class="modal-content">

<span class="close">&times;</span>

<h3>Event Guidelines</h3>

<br>

<p>• Carry your Student ID Card.</p>

<p>• Reach the venue 15 minutes early.</p>

<p>• Follow college discipline.</p>

<p>• Register before participating.</p>

</div>

</div>

<script>
    /* ===========================
   Apply Saved Theme
=========================== */

function loadTheme(){

    let theme = localStorage.getItem("theme");

    if(theme === "dark"){

        document.body.classList.add("dark");

    }

    else{

        document.body.classList.remove("dark");

    }

}

loadTheme();

/* ===========================
   Event Guidelines Modal
=========================== */

const modal = document.getElementById("eventModal");

const btn = document.getElementById("eventBtn");

const closeBtn = document.querySelector(".close");

btn.onclick = function(){

    modal.style.display = "block";

}

closeBtn.onclick = function(){

    modal.style.display = "none";

}

window.onclick = function(event){

    if(event.target == modal){

        modal.style.display = "none";

    }

}

/* ===========================
   Automatic Image Slider
=========================== */

let slides = document.querySelectorAll(".slide");

let index = 0;

function showSlides(){

    for(let i = 0; i < slides.length; i++){

        slides[i].classList.remove("active");

    }

    index++;

    if(index > slides.length){

        index = 1;

    }

    slides[index-1].classList.add("active");

}

setInterval(showSlides,3000);

</script>

</body>
</html>