<?php
// config.php

// Database connection settings
$host = 'localhost'; // Database host
$dbname = 'form_data'; // Database name
$username = 'maria'; // Database username
$password = 'Maria123'; // Database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Display connection success message (optional for debugging)
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
