<?php session_start(); require_once __DIR__ . "/auth_guard.php"; require_login(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance - Student Hub Portal</title>

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
    min-width:850px;
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

tr:nth-child(even){
    background:#f9f9f9;
}

.good{
    color:green;
    font-weight:bold;
}

.average{
    color:orange;
    font-weight:bold;
}

.low{
    color:red;
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

/* -------- Dark Mode -------- */

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
    font-size:14px;
    padding:10px;
}

}

</style>

</head>

<body>

<h1>Student Hub Portal</h1>

<h2>Attendance Report</h2>

<table>

<tr>
    <th>Course Code</th>
    <th>Subject</th>
    <th>Total Classes</th>
    <th>Classes Attended</th>
    <th>Attendance (%)</th>
    <th>Status</th>
</tr>

<tr>
    <td>CSUC201</td>
    <td>Fundamentals of Data Structures & Algorithms</td>
    <td>40</td>
    <td>37</td>
    <td>92.5%</td>
    <td class="good">Excellent</td>
</tr>

<tr>
    <td>ITUC201</td>
    <td>Computer Networks</td>
    <td>38</td>
    <td>34</td>
    <td>89.5%</td>
    <td class="good">Excellent</td>
</tr>

<tr>
    <td>CEUE203</td>
    <td>Object Oriented Programming</td>
    <td>36</td>
    <td>31</td>
    <td>86.1%</td>
    <td class="good">Excellent</td>
</tr>

<tr>
    <td>ITUE204</td>
    <td>Web Development</td>
    <td>35</td>
    <td>30</td>
    <td>85.7%</td>
    <td class="good">Excellent</td>
</tr>

<tr>
    <td>MSUD203</td>
    <td>Discrete Mathematics</td>
    <td>39</td>
    <td>33</td>
    <td>84.6%</td>
    <td class="good">Excellent</td>
</tr>

<tr>
    <td>HSUV201</td>
    <td>Creativity, Problem Solving & Innovation</td>
    <td>25</td>
    <td>20</td>
    <td>80%</td>
    <td class="average">Good</td>
</tr>

</table>

<h2>Overall Attendance : <span style="color:green;">86.4%</span></h2>

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
