CRUD Application in PHP with MySQL

Project Description:
  This is a simple CRUD (Create, Read, Update, Delete) application built with PHP and MySQL. The application allows you to manage student records with basic operations:
    -Create new student records
    -View all student records in a table
    -Update existing student information
    -Delete student records

Features:
  -Database Operations: Full CRUD functionality
  -User Interface: Clean Bootstrap-based interface
  -Security: Basic input sanitization with htmlspecialchars()
  -Error Handling: Try-catch blocks for database operations
  -Responsive Design: Works on mobile and desktop devices

File Structure:
  crud-app/
  │── dbConnection.php    # Database connection setup
  │── delete.php          # Delete student records
  │── index.php           # Main page showing all students
  │── insert.php          # Add new students
  │── update.php          # Edit existing students

Installation:
 1- Prerequisites:
  -PHP (version 7.0 or higher)
  -MySQL server
  -Web server (Apache, Nginx, etc.)
  
  2-Setup Database:
    1-Create a database named crud
    2-Create a table named students with the following structure:
  sql->
    CREATE TABLE students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        age INT NOT NULL
    );
    
  3-Configuration:
  Edit dbConnection.php with your database credentials:
  php->
    $hostname = "localhost";
    $dbname = "crud";
    $user = "your_username";
    $password = "your_password";
    
  4-Run the Application:
  Place all files in your web server's document root
  Access the application via http://localhost/crud-app/index.php

Usage:
View Students: The main page (index.php) displays all student records in a table.
Add Student: Click the "Add Student" button to create new records.
Update Student: Click the "Update" button next to a student to edit their information.
Delete Student: Click the "Delete" button to remove a student record (with confirmation).

Security Notes:
This is a basic implementation for educational purposes
For production use, consider adding:
User authentication
More robust input validation
Prepared statements for all database queries
CSRF protection

Technologies Used:
-PHP
-MySQL (PDO)
-Bootstrap 5
-HTML5
-CSS3
