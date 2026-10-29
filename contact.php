<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Student Hub Portal</title>

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

.container{
    display:grid;
    grid-template-columns:1fr;
    gap:25px;

    width:90%;
    max-width:700px;
    margin:30px auto;

    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.15);
}

form{
    display:grid;
    gap:15px;
}

label{
    font-size:18px;
    font-weight:bold;
}

input,
textarea{
    width:100%;
    padding:12px;
    font-size:16px;
    border:1px solid #ccc;
    border-radius:5px;
}

textarea{
    resize:vertical;
}

button{
    width:100%;
    padding:12px;
    background:#003366;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#0055aa;
}

.details{
    text-align:center;
    line-height:2;
}

.details h3{
    color:#003366;
}

.home{
    display:flex;
    justify-content:center;
}

.home a{
    text-decoration:none;
    background:#003366;
    color:white;
    padding:10px 20px;
    border-radius:5px;
}

.home a:hover{
    background:#0055aa;
}

/* Success Message */

#successMsg{
    display:none;
    text-align:center;
    color:green;
    font-weight:bold;
    font-size:18px;
}

/* Dark Mode */

.dark{
    background:#121212;
    color:white;
}

.dark .container{
    background:#1f2937;
}

.dark input,
.dark textarea{
    background:#374151;
    color:white;
    border:1px solid #555;
}

.dark input::placeholder,
.dark textarea::placeholder{
    color:#ccc;
}

.dark .details h3{
    color:#93c5fd;
}

.dark button{
    background:#2563eb;
}

.dark button:hover{
    background:#1d4ed8;
}

.dark .home a{
    background:#2563eb;
}

.dark .home a:hover{
    background:#1d4ed8;
}

.dark #successMsg{
    color:#4ade80;
}

/* Tablet */

@media(min-width:768px){

.container{
    max-width:750px;
    padding:40px;
}

h1{
    font-size:2.3rem;
}

}

</style>

</head>

<body>

<h1>Contact Us</h1>

<div class="container">

<form id="contactForm">

<label>Name</label>
<input type="text" placeholder="Enter your name" required>

<label>Email</label>
<input type="email" placeholder="Enter your email" required>

<label>Message</label>
<textarea rows="5" placeholder="Write your message here..." required></textarea>

<button type="submit">Send Message</button>

</form>

<p id="successMsg">✅ Your message has been sent successfully!</p>

<div class="details">

<h3>Student Hub Portal</h3>

<p>📍 MIT-ADT UNIVERSITY, PUNE, INDIA</p>

<p>📧 studenthub@mit-adt.edu.in</p>

<p>📞 +91 98765 43210</p>

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

/* Contact Form */

document.getElementById("contactForm").addEventListener("submit",function(e){

    e.preventDefault();

    document.getElementById("successMsg").style.display="block";

    this.reset();

});

</script>

</body>
</html>