<?php
session_start(); require_once 'db.php'; require_once 'auth_guard.php';
if(isset($_SESSION['user_id'])) audit($pdo,(int)$_SESSION['user_id'],'Logged out');
$_SESSION=[]; if(ini_get('session.use_cookies')){$p=session_get_cookie_params();setcookie(session_name(),'',['expires'=>time()-42000,'path'=>$p['path'],'domain'=>$p['domain'],'secure'=>$p['secure'],'httponly'=>$p['httponly'],'samesite'=>'Lax']);} session_destroy(); header('Location: login.php?logged_out=1');exit;
?>
