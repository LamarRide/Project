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
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $capacity = $_POST['capacity'];

    // Insert ride data into the database
    $query = "INSERT INTO rides (user_id, from_location, to_location, date, time, capacity)
              VALUES ('$userId', '$from', '$to', '$date', '$time', '$capacity')";
    mysqli_query($conn, $query);

    // Redirect to the home page
    header("Location: home.php");
    exit();
}
?>
