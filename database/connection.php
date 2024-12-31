<?php



// Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

// Create connection
$conn = new PDO("mysql:local=localhost;dbname=situation" , $username , $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
