<?php
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL username is 'root'
$password = "";      // Default is an empty password for XAMPP MySQL
$dbname = "ass-3_node";  // Use your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
