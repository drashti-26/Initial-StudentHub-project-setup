# StudentHub Portal

A responsive student portal built with **PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap**. StudentHub brings common student information and event-related pages into one web application, with separate student and administrator access.

## Features

### Student features
- Student registration with server-side validation.
- Login and logout using PHP sessions.
- Student dashboard.
- Profile, timetable, and attendance pages.
- College information, contact, and event pages.
- Event data endpoint that returns JSON for asynchronous requests.

### Administrator features
- Role-restricted Admin Panel.
- Dashboard statistics for users, students, events, and registrations.
- Recent event-registration overview.
- Audit logs for selected account and page activities.

### Security and usability
- Password hashing with `password_hash()` and verification with `password_verify()`.
- Prepared SQL statements for authentication and registration queries.
- Session-based authentication and role checks for protected pages.
- HTML output escaping through the shared `h()` helper where used.
- Responsive layouts and Bootstrap styling on selected pages.
- Database constraints to help prevent duplicate email addresses and duplicate event registrations.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Server-side logic, sessions, authentication, and page rendering |
| MySQL | Persistent application data |
| PDO | Database connectivity and prepared statements |
| HTML5 / CSS3 | Page structure and styling |
| JavaScript / Fetch API | Client-side interactions and asynchronous event data |
| Bootstrap 5.3.3 | Responsive components on selected pages |
| XAMPP / Apache | Local development server |
| phpMyAdmin | Database setup and administration |

## Project Structure

```text
StudentHub_Final/
├── home.php                         # Portal home page
├── about.php                        # About page
├── contact.php                      # Contact page
├── events.php                       # Events page
├── api_events.php                   # JSON endpoint for event data
├── login.php                        # Login form
├── signup.php                       # Student registration form
├── authenticate.php                 # Login processing
├── logout.php                       # Logout and session cleanup
├── dashboard.php                    # Student/admin dashboard
├── profile.php                      # Student profile page
├── timetable.php                    # Timetable page
├── attendance.php                    # Attendance page
├── admin.php                        # Admin-only user overview
├── audit_logs.php                   # Admin-only audit log view
├── auth_guard.php                   # Authentication, role, and helper functions
├── db.php                           # PDO database connection
├── studenthub.sql                   # Database schema and setup SQL
├── TEST_SECURITY_ACCESSIBILITY_REPORT.md
├── events_api_demo.html             # Event API demonstration page
└── image files                      # College and event images used by the UI
```

## Requirements

- Windows, Linux, or macOS
- XAMPP (Apache, PHP, and MySQL/MariaDB)
- A modern browser
- phpMyAdmin or another MySQL client

## Installation and Setup

### 1. Start XAMPP

1. Install XAMPP if it is not already installed.
2. Open the XAMPP Control Panel.
3. Start **Apache** and **MySQL**.

### 2. Copy the project

Extract the project ZIP and copy the `StudentHub_Final` folder into XAMPP's web root.

On Windows, the usual path is:

```text
C:\xampp\htdocs\StudentHub_Final
```

### 3. Create the database

1. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Select **Import**.
3. Choose the project's `studenthub.sql` file.
4. Run the import.

The SQL file creates the `studenthub` database and the tables defined by the project schema.

### 4. Configure the database connection

Open `db.php` and verify the local database settings. A typical XAMPP configuration is:

```php
$host = 'localhost';
$dbname = 'studenthub';
$dbuser = 'root';
$dbpass = '';
```

Use the username and password configured on your own MySQL installation. If your MySQL root account has a password, enter it in `$dbpass`. Do not commit real database credentials to a public repository.

### 5. Open StudentHub

Visit:

[http://localhost/StudentHub_Final/home.php](http://localhost/StudentHub_Final/home.php)

If the project uses a different folder name, update the URL to match that folder. Run the application through Apache rather than opening PHP files directly from the filesystem.

## Using the Portal

1. Open the home page.
2. Use **Sign Up** to create a student account.
3. Log in with the registered email and password.
4. Explore the dashboard, profile, timetable, attendance, and events pages.
5. Administrator-only pages, including the Admin Panel and Audit Logs, require an account with the `admin` role.

An administrator account may need to be created or configured locally using the project's setup process. Do not expose any setup or reset scripts on a public server; remove them after use.

## Testing Checklist

A test report template is included in `TEST_SECURITY_ACCESSIBILITY_REPORT.md`. Run the following checks in your local environment and record the actual results.

- [ ] Register with valid details.
- [ ] Confirm invalid details are rejected and duplicate email registration is prevented.
- [ ] Log in with valid credentials.
- [ ] Confirm invalid credentials do not create a logged-in session.
- [ ] Log out and try to open `dashboard.php` directly.
- [ ] Log in as a student and verify that `admin.php` and `audit_logs.php` deny access.
- [ ] Log in as an administrator and verify dashboard statistics and audit logs.
- [ ] Check that the event API returns JSON and the event page loads as expected.
- [ ] Check navigation and layout on desktop and mobile screen sizes.
- [ ] Check form labels, keyboard navigation, and readable error messages.

Only mark a test as passed after you have performed it and confirmed the result.

## Database Overview

The SQL setup defines data tables for core portal information, including user accounts, student details, events, registrations, and other portal records included in the schema. Foreign keys and uniqueness constraints are used where defined in the SQL file.

## Troubleshooting

**Database connection failed**
- Confirm that MySQL is running in XAMPP.
- Confirm that the `studenthub` database has been imported.
- Check the host, database name, username, and password in `db.php`.

**Page not found**
- Confirm the project folder is inside `htdocs`.
- Check the folder name and URL.
- Make sure Apache is running.

**Login does not work**
- Confirm that the account exists in the database and that its password was stored using the expected password-hashing flow.
- Check that the email and password are entered correctly.
- Check the PHP/Apache error logs if the issue continues.

**Admin page shows access denied**
- The current account must have the `admin` role. Student accounts should not be granted administrator access.

## Security Notes

This project is intended for local coursework and learning. Before deploying it publicly, review the complete application and strengthen it as needed. In particular:

- Keep database credentials private.
- Remove or disable setup/reset scripts after local setup.
- Use HTTPS and secure production session-cookie settings.
- Add CSRF protection to state-changing forms.
- Review validation, authorization, error handling, and rate limiting across every endpoint.
- Do not publish real student data or passwords in the repository.
- Test the complete application before describing it as production-ready.

## Author

- **Name:** Drashti Gondha
- **Student ID:** 25CS017
- **Course:** Web Development Frameworks (ITUE203)
- **Academic Year:** 2026–2027

## License

This project was prepared for educational/coursework purposes. No separate open-source license is specified.
