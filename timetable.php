<?php session_start(); require_once __DIR__ . "/auth_guard.php"; require_login(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Timetable</title>

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
    color:#003366;
    margin:25px 0;
}

/* Responsive Table */

.table-container{
    width:95%;
    max-width:1200px;
    margin:20px auto;
    overflow-x:auto;
}

table{
    width:100%;
    min-width:900px;
    border-collapse:collapse;
    background:white;
    box-shadow:0 0 8px rgba(0,0,0,0.15);
}

th,
td{
    border:1px solid #000;
    padding:12px;
    text-align:center;
}

th{
    background:#003366;
    color:white;
}

.break{
    background:#ffe699;
    font-weight:bold;
}

.lab{
    background:#d9ead3;
    font-weight:bold;
}

.back{
    display:flex;
    justify-content:center;
    margin:30px 0;
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

/* ---------- Dark Mode ---------- */

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

.dark .break{
    background:#8b6b00;
    color:white;
}

.dark .lab{
    background:#1f6f43;
    color:white;
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

th,
td{
    padding:10px;
    font-size:14px;
}

}

</style>
</head>

<body>

<h1>Student Hub Portal</h1>

<h2>B.Tech CSE - Semester 3 Timetable</h2>

<table>

<tr>
<th>Day</th>
<th>9:10-10:10</th>
<th>10:10-11:10</th>
<th>11:10-12:10</th>
<th>12:10-1:10</th>
<th>1:10-2:10</th>
<th>2:10-2:20</th>
<th>2:20-3:20</th>
<th>3:20-4:20</th>
</tr>

<tr>
<td><b>Monday</b></td>
<td>FDSA</td>
<td>Computer Networks</td>
<td>Discrete Mathematics</td>
<td class="break">Lunch</td>
<td>Web Development</td>
<td class="break">Break</td>
<td class="lab" colspan="2">FDSA Lab</td>
</tr>

<tr>
<td><b>Tuesday</b></td>
<td>OOP</td>
<td>Creativity & Innovation</td>
<td>Computer Networks</td>
<td class="break">Lunch</td>
<td>Discrete Mathematics</td>
<td class="break">Break</td>
<td class="lab" colspan="2">OOP Lab</td>
</tr>

<tr>
<td><b>Wednesday</b></td>
<td>Web Development</td>
<td>FDSA</td>
<td>OOP</td>
<td class="break">Lunch</td>
<td>Computer Networks</td>
<td class="break">Break</td>
<td class="lab" colspan="2">Web Development Lab</td>
</tr>

<tr>
<td><b>Thursday</b></td>
<td>Discrete Mathematics</td>
<td>Web Development</td>
<td>Creativity & Innovation</td>
<td class="break">Lunch</td>
<td>FDSA</td>
<td class="break">Break</td>
<td>Project Work</td>
<td>Mentoring</td>
</tr>

<tr>
<td><b>Friday</b></td>
<td>Computer Networks</td>
<td>OOP</td>
<td>Discrete Mathematics</td>
<td class="break">Lunch</td>
<td>Seminar</td>
<td class="break">Break</td>
<td>Sports</td>
<td>Library</td>
</tr>

<tr>
<td><b>Saturday</b></td>
<td colspan="8">Holiday</td>
</tr>

</table>

<h2>Course Details</h2>

<table>

<tr>
<th>Course Code</th>
<th>Subject</th>
</tr>

<tr>
<td>CSUC201</td>
<td>Fundamentals of Data Structures and Algorithms (FDSA)</td>
</tr>

<tr>
<td>ITUC201</td>
<td>Computer Networks</td>
</tr>

<tr>
<td>CEUE203</td>
<td>Object Oriented Programming (OOP)</td>
</tr>

<tr>
<td>ITUE204</td>
<td>Web Development</td>
</tr>

<tr>
<td>MSUD203</td>
<td>Discrete Mathematics</td>
</tr>

<tr>
<td>HSUV201</td>
<td>Creativity, Problem Solving & Innovation</td>
</tr>

</table>

<div class="back">
<a href="dashboard.php">← Back to Dashboard</a>
</div>

<script>
    /* Apply Saved Theme */

if(localStorage.getItem("theme")=="dark"){
    document.body.classList.add("dark");
}

</script>

</body>
</html>


