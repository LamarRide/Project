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
    $rideId = $_POST['ride_id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $capacity = $_POST['capacity'];

    // Update the ride data in the database
    $query = "UPDATE rides SET from_location = '$from', to_location = '$to', date = '$date', time = '$time', capacity = '$capacity'
              WHERE id = '$rideId'";
    mysqli_query($conn, $query);

    // Redirect to the My Rides page
    header("Location: my_rides.php");
    exit();
}
?>
