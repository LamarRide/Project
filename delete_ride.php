<?php
session_start();

// Include the config.php file
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if ride ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: my_rides.php");
    exit();
}

$rideId = $_GET['id'];

// Delete the ride and associated bookings from the database
$deleteBookingsQuery = "DELETE FROM bookings WHERE ride_id = '$rideId'";
mysqli_query($conn, $deleteBookingsQuery);

$deleteRideQuery = "DELETE FROM rides WHERE id = '$rideId'";
mysqli_query($conn, $deleteRideQuery);

// Redirect to the My Rides page
header("Location: my_rides.php");
exit();
?>
