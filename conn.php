<?php
$user = 'root';
$pass = ''; 
$dbName = 'genmed_db';

// Create connection
$conn = new mysqli('localhost', $user, $pass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>
