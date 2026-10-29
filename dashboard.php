```php
<?php
session_start();
require_once 'db.php';
require_once 'auth_guard.php';

require_login();

$userId = (int)$_SESSION['user_id'];
$role = $_SESSION['role'] ?? 'student';
$username = $_SESSION['name'] ?? $_SESSION['username'] ?? 'User';

if (!in_array($role, ['admin', 'student'], true)) {
    http_response_code(403);
    exit('403 Forbidden: Invalid user role.');
}

$latest = [];

if ($role === 'admin') {
    $stats = [
        'Users' => (int)$pdo->query('SELECT COUNT(*) FROM users')->fetchColumn(),
        'Students' => (int)$pdo->query('SELECT COUNT(*) FROM students')->fetchColumn(),
        'Events' => (int)$pdo->query('SELECT COUNT(*) FROM events')->fetchColumn(),
        'Registrations' => (int)$pdo->query('SELECT COUNT(*) FROM registrations')->fetchColumn()
    ];

    $latest = $pdo->query("
        SELECT
            r.registration_id,
            r.registration_date,
            s.student_name,
            s.email,
            e.event_name,
            e.event_date
        FROM registrations r
        INNER JOIN students s ON s.student_id = r.student_id
        INNER JOIN events e ON e.event_id = r.event_id
        ORDER BY r.registration_date DESC
        LIMIT 8
    ")->fetchAll(PDO::FETCH_ASSOC);

    audit($pdo, $userId, 'Viewed admin dashboard');

} else {
    $st = $pdo->prepare("
        SELECT COUNT(*)
        FROM registrations r
        INNER JOIN students s ON s.student_id = r.student_id
        WHERE s.email = (
            SELECT email FROM users WHERE id = ?
        )
    ");

    $st->execute([$userId]);

    $stats = [
        'My Registrations' => (int)$st->fetchColumn()
    ];

    audit($pdo, $userId, 'Viewed student dashboard');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - StudentHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .top {
            background: #003366;
            color: #fff;
            padding: 22px;
        }
        .card {
            border: 0;
            box-shadow: 0 3px 14px #0001;
        }
        .stat {
            font-size: 2rem;
            font-weight: 700;
            color: #003366;
        }
    </style>
</head>
<body>

<header class="top">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div>
            <h1 class="h3 mb-1">StudentHub Portal</h1>
            <div>
                Welcome, <?= h($username) ?>
                · <?= h(ucfirst($role)) ?>
            </div>
        </div>
        <a class="btn btn-light" href="logout.php">Logout</a>
    </div>
</header>

<main class="container py-4">
    <nav class="nav nav-pills bg-white rounded p-2 mb-4 gap-2">
        <a class="nav-link active" href="dashboard.php">Dashboard</a>
        <a class="nav-link" href="home.php">Home</a>
        <a class="nav-link" href="events.php">Events</a>
        <a class="nav-link" href="profile.php">Profile</a>
        <a class="nav-link" href="timetable.php">Timetable</a>
        <a class="nav-link" href="attendance.php">Attendance</a>

        <?php if ($role === 'admin'): ?>
            <a class="nav-link" href="admin.php">Admin Panel</a>
            <a class="nav-link" href="audit_logs.php">Audit Logs</a>
        <?php endif; ?>
    </nav>

    <h2 class="h4 mb-3">Dashboard Statistics</h2>

    <div class="row g-3 mb-4">
        <?php foreach ($stats as $label => $value): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card p-3 h-100">
                    <div class="text-secondary"><?= h($label) ?></div>
                    <div class="stat"><?= h($value) ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($role === 'admin'): ?>
        <section class="card p-3">
            <h2 class="h4">Latest Registrations</h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student</th>
                            <th>Email</th>
                            <th>Event</th>
                            <th>Event Date</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($latest)): ?>
                            <tr>
                                <td colspan="6">No registrations yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($latest as $r): ?>
                                <tr>
                                    <td><?= h($r['registration_id']) ?></td>
                                    <td><?= h($r['student_name']) ?></td>
                                    <td><?= h($r['email']) ?></td>
                                    <td><?= h($r['event_name']) ?></td>
                                    <td><?= h($r['event_date']) ?></td>
                                    <td><?= h($r['registration_date']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php else: ?>
        <div class="alert alert-info">
            You are logged in with student access.
            Admin tools are restricted to authorized administrators.
        </div>
    <?php endif; ?>
</main>

</body>
</html>
```