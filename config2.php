<?php
// Database configuration


$host = 'localhost';
$username = 'ride';
$password = 'Ride#987';
$database = 'ride_sharing_app';

// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);
session_start();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
