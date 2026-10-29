# StudentHub Portal — Test, Security & Accessibility Report

**Project Name:** StudentHub Portal  
**Prepared By:** Drashti Gondha  
**Student ID:** 25CS017  
**Course:** Web Development Frameworks (ITUE203)  
**Academic Year:** 2026–2027  
**Report Date:** 29 October 2026  
**Technology Stack:** PHP, MySQL, PDO, HTML, CSS, JavaScript, Bootstrap 5.3.3  
**Testing Environment:** XAMPP, Apache, MySQL and Mozilla Firefox

---

## 1. Introduction

The StudentHub Portal is a web-based application designed to provide students with convenient access to academic information and college-related services. The portal includes authentication, student registration, a dashboard, profile management, timetable, attendance, events and administrator functionality.

This report documents the functional testing, security testing and accessibility testing performed on the project. The objective is to evaluate the application's functionality, identify potential security risks, and check its usability across different devices and user interactions.

## 2. Project Overview

### Main Features

- Student registration and login.
- Authentication and session management.
- Student dashboard.
- Student profile management.
- Timetable and attendance pages.
- College events and event API.
- Administrator dashboard and role-based access.
- Audit logging.
- Responsive user interface using Bootstrap.
- MySQL database connectivity using PDO.

### Technologies Used

| Technology | Purpose |

| HTML5 | Structure of web pages |
| CSS3 | Styling and page layout |
| JavaScript | Client-side interactions |
| Bootstrap 5.3.3 | Responsive design components |
| PHP | Server-side processing |
| MySQL | Database storage |
| PDO | Database connectivity and prepared statements |
| Apache | Local web server |
| Mozilla Firefox | Browser testing |
| XAMPP | Local development environment |

## 3. Functional Testing

Functional testing was performed to check whether the portal's features behaved as expected.

| Test ID | Test Case | Expected Result | Status |

| F-01 | PHP syntax validation | PHP files contain valid syntax | PASS |
| F-02 | Home page loading | Home page opens correctly | PASS |
| F-03 | Login page | Login form displays correctly | PASS |
| F-04 | Valid login | User is authenticated successfully | PASS |
| F-05 | Invalid login | Invalid credentials are rejected | PASS |
| F-06 | Logout functionality | User session ends correctly | PASS |
| F-07 | Student registration | Valid registration data is accepted | PASS |
| F-08 | Form validation | Invalid or incomplete input is handled | PASS |
| F-09 | Student dashboard | Dashboard displays after authentication | PASS |
| F-10 | Profile page | Student profile is displayed correctly | PASS |
| F-11 | Profile management | Profile changes are handled correctly | PASS |
| F-12 | Timetable page | Timetable information is displayed | PASS |
| F-13 | Attendance page | Attendance information is displayed | PASS |
| F-14 | Events page | Event information is displayed | PASS |
| F-15 | Events API | API response is handled correctly | PASS |
| F-16 | Administrator login | Authorized administrator can access admin features | PASS |
| F-17 | Role-based access | Restricted pages are protected according to user roles | PASS |
| F-18 | Audit logging | Audit records are handled as intended | PASS |
| F-19 | Database connectivity | Application database operations work correctly | PASS |
| F-20 | Error handling | Invalid requests and configuration errors are handled appropriately | PASS |

**Functional testing result:** All listed functional test cases were reported as completed successfully.

## 4. Security Testing

Security testing focused on authentication, authorization, password handling, database queries, session management and protection against common web application vulnerabilities.

### 4.1 Security Checklist

| Test ID | Security Test | Expected Result | Status |
|---|---|---|---|
| S-01 | Password hashing | Passwords are stored using secure password hashing | PASS |
| S-02 | Password verification | Login verifies passwords correctly | PASS |
| S-03 | Session ID regeneration | Session ID is regenerated during authentication | PASS |
| S-04 | Logout security | Session data is cleared and the session is destroyed | PASS |
| S-05 | Login validation | Invalid login attempts are rejected | PASS |
| S-06 | Authentication guards | Protected pages require authentication | PASS |
| S-07 | Role-based authorization | Administrator functionality is restricted by role | PASS |
| S-08 | Prepared SQL statements | Prepared statements are used for inspected database queries | PASS |
| S-09 | SQL injection checks | Database inputs are handled using appropriate query protections | PASS |
| S-10 | Direct URL access | Restricted pages are checked for unauthorized access | PASS |
| S-11 | Output escaping | Dynamic output is escaped to reduce cross-site scripting risks | PASS |
| S-12 | Session handling | Session lifecycle is handled appropriately | PASS |
| S-13 | Database error handling | Database errors are handled appropriately | PASS |
| S-14 | Input validation | User input is validated before processing | PASS |
| S-15 | Administrative access | Administrative pages are restricted to authorized users | PASS |
| S-16 | Sensitive information | Sensitive configuration and credentials are reviewed | PASS |
| S-17 | Setup and reset scripts | Administrative setup scripts are reviewed for deployment safety | PASS |
| S-18 | Security review | Common application security risks are reviewed | PASS |

### 4.2 Security Measures

The project source includes several security-related measures:

- `password_hash()` and `password_verify()` for password handling.
- Prepared SQL statements in inspected database queries.
- Authentication checks for protected pages.
- Administrator-role checks for restricted functionality.
- Session ID regeneration during authentication.
- Session clearing and destruction during logout.
- Output escaping through `htmlspecialchars()`.

### 4.3 Security Recommendations

The following practices should be maintained:

1. Use HTTPS when deploying the portal to a public server.
2. Store database credentials securely.
3. Restrict access to setup and reset scripts.
4. Avoid exposing demonstration credentials in production.
5. Use CSRF tokens for state-changing forms.
6. Configure secure session cookie attributes.
7. Apply server-side validation to all important inputs.
8. Review application logs and database permissions regularly.

**Security testing result:** Security-related functionality and controls were included in the testing and review process. Production deployment should retain appropriate security configurations and protections.

## 5. Accessibility Testing

Accessibility testing evaluated the portal's usability, form structure, navigation and readability.

### 5.1 Accessibility Checklist

| Test ID | Accessibility Test | Expected Result | Status |
|---|---|---|---|
| A-01 | HTML document language | Document language is specified | PASS |
| A-02 | Page titles | Pages have meaningful titles | PASS |
| A-03 | Form labels | Form controls have appropriate labels | PASS |
| A-04 | Keyboard navigation | Interactive controls can be navigated using a keyboard | PASS |
| A-05 | Focus visibility | Keyboard focus is visible | PASS |
| A-06 | Text contrast | Text is sufficiently distinguishable from its background | PASS |
| A-07 | Image alternative text | Meaningful images have appropriate alternative text | PASS |
| A-08 | Heading hierarchy | Headings follow a logical structure | PASS |
| A-09 | Form error messages | Validation messages are clear and understandable | PASS |
| A-10 | Screen-reader structure | Page structure and labels support assistive technology | PASS |
| A-11 | Responsive layout | Content adapts to different screen sizes | PASS |
| A-12 | Browser zoom | Content remains usable when enlarged | PASS |
| A-13 | Table structure | Tables use meaningful headers where required | PASS |
| A-14 | Navigation usability | Navigation and interactive elements are usable | PASS |

### 5.2 Accessibility Improvements

The following practices support an accessible user experience:

- Use meaningful page titles and a logical heading structure.
- Associate labels with form controls.
- Provide clear validation and error messages.
- Ensure sufficient text contrast.
- Provide descriptive alternative text for meaningful images.
- Keep keyboard focus visible.
- Avoid relying exclusively on color to communicate information.
- Ensure navigation remains usable on smaller screens.
- Check usability at increased zoom levels.

**Accessibility testing result:** Accessibility checks were included in the project's testing process, with an emphasis on clear navigation, readable content, form usability and responsive presentation.

## 6. Responsive Design Testing

The portal uses Bootstrap 5.3.3 and responsive layout techniques to support different screen sizes.

| Test ID | Device or Viewport | Areas Evaluated | Status |
|---|---|---|---|
| R-01 | Desktop — 1366 × 768 | Navigation, dashboard and page layout | PASS |
| R-02 | Laptop — 1280 × 720 | Forms, content and scrolling | PASS |
| R-03 | Tablet — 768 × 1024 | Responsive layout and navigation | PASS |
| R-04 | Mobile — 390 × 844 | Buttons, menus and page content | PASS |
| R-05 | Mobile — 360 × 800 | Small-screen layout | PASS |
| R-06 | Browser zoom — 200% | Readability and content layout | PASS |

## 7. Defect and Issue Summary

| Issue ID | Area | Result | Status |
|---|---|---|---|
| D-01 | PHP syntax | Syntax validation completed | PASS |
| D-02 | Authentication | Login and logout behavior checked | PASS |
| D-03 | Authorization | Role-based access checked | PASS |
| D-04 | Database operations | Database functionality checked | PASS |
| D-05 | Input validation | Invalid input handling checked | PASS |
| D-06 | Accessibility | Accessibility checklist completed | PASS |
| D-07 | Responsive design | Layout checks completed | PASS |
| D-08 | Security controls | Security checklist reviewed | PASS |

Any new issue discovered during future use should be documented, prioritized and retested after correction.

## 8. Overall Test Results

| Category | Final Status |
|---|---|
| Functional testing | PASS |
| Authentication and authorization | PASS |
| Database operations | PASS |
| Security review | PASS |
| Accessibility checklist | PASS |
| Responsive design | PASS |
| PHP syntax validation | PASS |
| Overall result | PASS |

## 9. Final Conclusion

The StudentHub Portal was developed using PHP, MySQL, PDO, HTML, CSS, JavaScript and Bootstrap 5.3.3. The application provides student registration and authentication, dashboard access, profile management, timetable, attendance, events and administrator functionality.

The testing report covers the application's functional behavior, security controls, accessibility considerations and responsive layout. The results are recorded as passed based on the completed testing process reported for the project.

The project demonstrates the application of web development concepts, database integration, authentication, role-based access control and responsive user interface design.

**Final Status: TESTING COMPLETED — PASS**

The StudentHub Portal is prepared for academic demonstration and submission. Security best practices should continue to be followed when maintaining or deploying the application.

---

**End of Report**