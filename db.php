<?php
// Database configuration
$host = "localhost";
$user = "root";          // default MySQL username in XAMPP
$pass = "";              // default MySQL password is empty
$dbname = "attendance_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Optional: set charset to avoid encoding issues
$conn->set_charset("utf8");
?>
