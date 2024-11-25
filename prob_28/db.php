<?php
$host = 'localhost';  // Your database host
$dbname = 'farm_shopping';  // Database name
$username = 'root';  // Database username
$password = '';  // Database password

// Create a new connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
