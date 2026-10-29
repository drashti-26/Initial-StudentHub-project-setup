<!DOCTYPE html>
<html>
<head>
    <title>About Us - Student Hub Portal</title>

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
    font-size:2rem;
}

.container{
    display:grid;
    grid-template-columns:1fr;
    width:90%;
    max-width:1000px;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
    gap:20px;
}

h2{
    color:#003366;
    margin-bottom:10px;
}

p{
    font-size:18px;
    line-height:1.8;
    text-align:justify;
}

ul{
    margin-left:20px;
    font-size:18px;
    line-height:1.8;
}

.home{
    display:flex;
    justify-content:center;
    margin-top:20px;
}

.home a{
    text-decoration:none;
    background:#003366;
    color:white;
    padding:12px 25px;
    border-radius:5px;
    transition:0.3s;
}

.home a:hover{
    background:#0055aa;
}

/* FAQ */

.faq{
    border:1px solid #ccc;
    border-radius:5px;
}

.faq-btn{
    width:100%;
    background:#003366;
    color:white;
    border:none;
    padding:15px;
    text-align:left;
    cursor:pointer;
    font-size:17px;
}

.faq-content{
    display:none;
    padding:15px;
    background:#f8f8f8;
}

/* Dark Mode */

.dark{
    background:#121212;
    color:white;
}

.dark .container{
    background:#1f2937;
}

.dark h2{
    color:#93c5fd;
}

.dark .faq{
    border:1px solid #555;
}

.dark .faq-btn{
    background:#2563eb;
}

.dark .faq-content{
    background:#374151;
    color:white;
}

.dark .home a{
    background:#2563eb;
}

.dark .home a:hover{
    background:#1d4ed8;
}

/* Tablet */

@media(min-width:768px){

.container{
    grid-template-columns:1fr 1fr;
}

.container h2,
.container p,
.container ul,
.faq,
.home{
    grid-column:1/3;
}

h1{
    font-size:2.4rem;
}

}

</style>

</head>

<body>

<h1>About Student Hub Portal</h1>

<div class="container">

<h2>Who We Are</h2>

<p>
Student Hub Portal is a simple web application developed to help students access important academic information in one place. It provides an easy way to view attendance, timetable, events, and profile details.
</p>

<h2>Our Mission</h2>

<p>
Our mission is to make student life easier by providing a user-friendly platform where students can quickly access useful information anytime.
</p>

<h2>Features</h2>

<ul>
<li>Student Login and Registration</li>
<li>Personal Dashboard</li>
<li>View Student Profile</li>
<li>Check Attendance</li>
<li>View Timetable</li>
<li>Latest College Events</li>
<li>Easy Navigation</li>
</ul>

<!-- FAQ -->

<div class="faq">

<button class="faq-btn">
Frequently Asked Questions ▼
</button>

<div class="faq-content">

<p><b>Q1.</b> What is Student Hub Portal?</p>
<p>It is a web portal that helps students access academic information easily.</p>

<br>

<p><b>Q2.</b> Can students view attendance?</p>
<p>Yes, students can view their attendance records from the dashboard.</p>

<br>

<p><b>Q3.</b> Is the portal mobile friendly?</p>
<p>Yes, it is fully responsive and works on mobiles, tablets and desktops.</p>

</div>

</div>

<div class="home">
<a href="home.php">← Back to Home</a>
</div>

</div>

<script>

/* Apply Saved Theme */

if(localStorage.getItem("theme")=="dark"){
    document.body.classList.add("dark");
}

/* FAQ Toggle */

const faqBtn=document.querySelector(".faq-btn");
const faqContent=document.querySelector(".faq-content");

faqBtn.onclick=function(){

if(faqContent.style.display==="block"){
    faqContent.style.display="none";
    faqBtn.innerHTML="Frequently Asked Questions ▼";
}
else{
    faqContent.style.display="block";
    faqBtn.innerHTML="Frequently Asked Questions ▲";
}

};

</script>

</body>
</html>