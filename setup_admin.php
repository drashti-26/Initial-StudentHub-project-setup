<?php
// Run once locally, then delete this file.
require_once 'db.php';
$accounts = [
    ['StudentHub Admin', 'admin@studenthub.local', 'Admin123!', 'admin'],
    ['Demo Student', 'student@studenthub.local', 'Student123!', 'student']
];
$userIds = [];
foreach ($accounts as [$name, $email, $plainPassword, $role]) {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $existing = $stmt->fetch();
    if ($existing) {
        $userId = (int)$existing['id'];
        $stmt = $pdo->prepare('UPDATE users SET name = ?, password = ?, role = ? WHERE id = ?');
        $stmt->execute([$name, password_hash($plainPassword, PASSWORD_DEFAULT), $role, $userId]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)');
        $stmt->execute([$name, $email, password_hash($plainPassword, PASSWORD_DEFAULT), $role]);
        $userId = (int)$pdo->lastInsertId();
    }
    $userIds[$role] = $userId;
}
$studentUserId = $userIds['student'];
$stmt = $pdo->prepare('SELECT id FROM students WHERE user_id = ?');
$stmt->execute([$studentUserId]);
$student = $stmt->fetch();
if ($student) {
    $studentId = (int)$student['id'];
} else {
    $stmt = $pdo->prepare('INSERT INTO students (user_id, name, mobile, course, year, gender) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$studentUserId, 'Demo Student', '9876543210', 'IT', 1, 'Other']);
    $studentId = (int)$pdo->lastInsertId();
}
$eventId = $pdo->query("SELECT id FROM events WHERE title = 'Tech Fest' LIMIT 1")->fetchColumn();
if ($eventId) {
    $stmt = $pdo->prepare('SELECT id FROM registrations WHERE student_id = ? AND event_id = ?');
    $stmt->execute([$studentId, (int)$eventId]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare('INSERT INTO registrations (student_id, event_id) VALUES (?, ?)');
        $stmt->execute([$studentId, (int)$eventId]);
    }
}
echo 'Demo accounts and sample registration are ready. Admin: admin@studenthub.local / Admin123! | Student: student@studenthub.local / Student123! Delete setup_admin.php now.';
?>
