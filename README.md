 🚀 PHP CRUD Application

A simple student management system with Create, Read, Update, Delete functionality.

 ✨ Features
- Full CRUD operations
- Bootstrap 5 responsive design
- PDO for database security
- Basic input sanitization
- Clean user interface

📦 Installation

1. **Requirements**:
   - PHP 7.0+
   - MySQL
   - Web server

2. **Database Setup**:
   ```sql
   CREATE DATABASE crud;
   USE crud;
   CREATE TABLE students (
       id INT AUTO_INCREMENT PRIMARY KEY,
       firstName VARCHAR(50) NOT NULL,
       lastName VARCHAR(50) NOT NULL,
       age INT NOT NULL
   );
   
🛠️ Built With:
    PHP
    MySQL/PDO
    Bootstrap 5
