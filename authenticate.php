<?php
session_start(); require_once 'db.php'; require_once 'auth_guard.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){header('Location: login.php');exit;}
$email=trim($_POST['email']??'');$password=$_POST['password']??'';
$stmt=$pdo->prepare('SELECT id,name,email,password,role FROM users WHERE email=? LIMIT 1');$stmt->execute([$email]);$user=$stmt->fetch();
if(!$user||!password_verify($password,$user['password'])){header('Location: login.php?error=1');exit;}
session_regenerate_id(true);$_SESSION['user_id']=(int)$user['id'];$_SESSION['name']=$user['name'];$_SESSION['email']=$user['email'];$_SESSION['role']=$user['role'];audit($pdo,(int)$user['id'],'Logged in');header('Location: dashboard.php');exit;
?>
