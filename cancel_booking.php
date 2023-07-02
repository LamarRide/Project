<?php
session_start();

// Include the config.php file
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if booking ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: my_rides.php");
    exit();
}

$bookingId = $_GET['id'];

// Delete the booking from the database
$query = "DELETE FROM bookings WHERE id = '$bookingId'";
mysqli_query($conn, $query);

// Redirect to the My Rides page
header("Location: my_rides.php");
exit();
?>
