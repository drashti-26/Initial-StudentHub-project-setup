<?php session_start(); require_once __DIR__ . "/auth_guard.php"; require_login(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile - Student Hub Portal</title>

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

.profile-box{

    display:grid;
    gap:20px;

    width:90%;
    max-width:600px;
    margin:30px auto;

    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.15);
}

h2{
    text-align:center;
    color:#003366;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:12px;
    border-bottom:1px solid #ccc;
}

td:first-child{
    font-weight:bold;
    color:#003366;
    width:40%;
}

.back{
    display:flex;
    justify-content:center;
}

.back a{
    text-decoration:none;
    background:#003366;
    color:white;
    padding:12px 24px;
    border-radius:5px;
}

.back a:hover{
    background:#0055aa;
}

/* -------- DARK MODE -------- */

.dark{
    background:#121212;
    color:white;
}

.dark .profile-box{
    background:#1f2937;
}

.dark h2{
    color:#93c5fd;
}

.dark td{
    border-bottom:1px solid #555;
}

.dark td:first-child{
    color:#93c5fd;
}

.dark .back a{
    background:#2563eb;
}

.dark .back a:hover{
    background:#1d4ed8;
}

/* Mobile */

@media(max-width:768px){

h1{
    font-size:28px;
}

h2{
    font-size:22px;
}

td{
    font-size:15px;
    padding:10px;
}

}

/* Desktop */

@media(min-width:768px){

.profile-box{
    padding:40px;
}

}

</style>

</head>

<body>

<h1>Student Profile</h1>

<div class="profile-box">

<h2>Profile Details</h2>

<table>

<tr>
<td><b>Name</b></td>
<td>Drashti Gondha</td>
</tr>

<tr>
<td><b>Enrollment No.</b></td>
<td>25CS017</td>
</tr>

<tr>
<td><b>Course</b></td>
<td>B.Tech Computer Science</td>
</tr>

<tr>
<td><b>Semester</b></td>
<td>Semester 2</td>
</tr>

<tr>
<td><b>Email</b></td>
<td>drashti@example.com</td>
</tr>

<tr>
<td><b>Phone</b></td>
<td>+91 9876543210</td>
</tr>

</table>

<div class="back">
<a href="dashboard.php">← Back to Dashboard</a>
</div>

</div>

<script>

/* Apply Saved Theme */

if(localStorage.getItem("theme")=="dark"){
    document.body.classList.add("dark");
}

</script>

</body>
</html>


