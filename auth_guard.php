
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('h')) {
    function h($value): string {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('require_login')) {
    function require_login(): void {
        if (empty($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }
    }
}

if (!function_exists('require_role')) {
    function require_role(string $role): void {
        require_login();

        if (($_SESSION['role'] ?? '') !== $role) {
            http_response_code(403);
            echo '<!doctype html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>403 Forbidden</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body class="container py-5">
                <div class="alert alert-danger">
                    <h1>403 Forbidden</h1>
                    <p>Access denied. You do not have permission to view this page.</p>
                </div>
                <a class="btn btn-primary" href="dashboard.php">Back to dashboard</a>
            </body>
            </html>';
            exit;
        }
    }
}

if (!function_exists('audit')) {
    function audit(PDO $pdo, ?int $userId, string $action): void {
        $stmt = $pdo->prepare(
            'INSERT INTO audit_logs (user_id, action) VALUES (?, ?)'
        );
        $stmt->execute([$userId, $action]);
    }
}
?>
