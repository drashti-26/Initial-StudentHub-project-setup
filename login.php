<?php
session_start();
require_once 'db.php';
require_once 'auth_guard.php';
if (!empty($_SESSION['user_id'])) { header('Location: dashboard.php'); exit; }
$error = isset($_GET['error']);
$success = isset($_GET['registered']);
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Login - Student Hub Portal</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><style>body{background:#f2f2f2;min-height:100vh;display:grid;place-items:center;font-family:Arial,sans-serif}.login-box{width:min(92%,420px);background:#fff;padding:32px;border-radius:12px;box-shadow:0 5px 20px #0002}h1{color:#003366}</style></head><body><main class="login-box"><h1 class="h3 text-center mb-4">Student Hub Login</h1>
<?php if($error): ?><div class="alert alert-danger">Invalid email or password.</div><?php endif; ?>
<?php if($success): ?><div class="alert alert-success">Registration successful. Please log in.</div><?php endif; ?>
<?php if(isset($_GET['logged_out'])): ?><div class="alert alert-success">You have logged out successfully.</div><?php endif; ?>
<form action="authenticate.php" method="post"><label for="email" class="form-label">Email</label><input class="form-control mb-3" type="email" name="email" id="email" required autocomplete="username"><label for="password" class="form-label">Password</label><input class="form-control mb-3" type="password" name="password" id="password" required autocomplete="current-password"><button class="btn btn-primary w-100" type="submit">Login</button></form><p class="mt-3 mb-1">Don't have an account? <a href="signup.php">Sign up</a></p><a href="home.php">← Back to Home</a><hr><p class="small text-secondary mb-1">Demo admin: admin@studenthub.local / Admin123!</p><p class="small text-secondary mb-0">Demo student: student@studenthub.local / Student123!</p></main></body></html>
