<?php
session_start();

// Include the config.php file
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $userId = $_SESSION['user_id'];
    $rideId = $_POST['ride_id'];

    // Insert booking data into the database
    $query = "INSERT INTO bookings (user_id, ride_id) VALUES ('$userId', '$rideId')";
    mysqli_query($conn, $query);

    // Redirect to the home page
    header("Location: home.php");
    exit();
}
?>
