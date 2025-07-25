-- if exist delete the database
DROP DATABASE IF EXISTS campusconnect;

-- new database name campusconnect
CREATE DATABASE campusconnect;
USE campusconnect;

-- sign up
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    department VARCHAR(100),
    password VARCHAR(255),
    profile_pic VARCHAR(255) DEFAULT 'default.png'
);


CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_title VARCHAR(100),
    description TEXT,
    course_code VARCHAR(50),
    department VARCHAR(100),
    level VARCHAR(20),
    term VARCHAR(20),
    year YEAR,
    batch VARCHAR(10),
    semester ENUM('Summer','Fall','Spring'),
    exam_type ENUM('quiz','mid','final'),
    file_type ENUM('Note','Question'),
    filename VARCHAR(255),
    uploaded_by INT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE CASCADE
);
