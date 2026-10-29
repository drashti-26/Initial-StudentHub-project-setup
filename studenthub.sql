CREATE DATABASE IF NOT EXISTS studenthub CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE studenthub;
CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('admin','student') NOT NULL DEFAULT 'student',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL UNIQUE,
 name VARCHAR(120) NOT NULL,
 mobile VARCHAR(10) NOT NULL,
 course VARCHAR(60) NOT NULL,
 year TINYINT NOT NULL,
 gender VARCHAR(20) NOT NULL,
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS events (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(150) NOT NULL,
 event_date DATE NOT NULL,
 description TEXT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS registrations (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 event_id INT NOT NULL,
 registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 UNIQUE KEY unique_registration (student_id,event_id),
 FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
 FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS attendance (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 attendance_date DATE NOT NULL,
 status ENUM('Present','Absent') NOT NULL DEFAULT 'Present',
 FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS timetable (
 id INT AUTO_INCREMENT PRIMARY KEY,
 course VARCHAR(60) NOT NULL,
 year TINYINT NOT NULL,
 subject VARCHAR(120) NOT NULL,
 day_name VARCHAR(20) NOT NULL,
 start_time TIME NOT NULL,
 end_time TIME NOT NULL
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS audit_logs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NULL,
 action VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 INDEX idx_audit_created (created_at),
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;
INSERT INTO events (title,event_date,description) SELECT 'Tech Fest','2026-11-15','Annual student technology event' WHERE NOT EXISTS (SELECT 1 FROM events WHERE title='Tech Fest');
INSERT INTO events (title,event_date,description) SELECT 'Sports Day','2026-11-20','Annual college sports day' WHERE NOT EXISTS (SELECT 1 FROM events WHERE title='Sports Day');
INSERT INTO timetable (course,year,subject,day_name,start_time,end_time) SELECT 'IT',1,'Programming Fundamentals','Monday','09:00:00','10:00:00' WHERE NOT EXISTS (SELECT 1 FROM timetable WHERE subject='Programming Fundamentals');
