
<?php
require_once "db.php";

$email = "admin@studenthub.local";
$password = "Admin123!";

$stmt = $pdo->prepare(
    "SELECT id FROM users WHERE email = ? AND role = 'admin' LIMIT 1"
);
$stmt->execute([$email]);
$admin = $stmt->fetch();

if (!$admin) {
    exit("Admin account not found with the admin role.");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "UPDATE users SET password = ? WHERE id = ?"
);
$stmt->execute([$hash, $admin["id"]]);

$stmt = $pdo->prepare(
    "SELECT password FROM users WHERE id = ?"
);
$stmt->execute([$admin["id"]]);
$savedHash = $stmt->fetchColumn();

if (password_verify($password, $savedHash)) {
    echo "Admin password reset and verified successfully.";
} else {
    echo "Password verification failed.";
}
?>
