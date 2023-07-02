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
    $carMake = $_POST['car_make'];
    $carModel = $_POST['car_model'];
    $carCapacity = $_POST['car_capacity'];

    // Insert car details into the database
    $query = "INSERT INTO cars (user_id, car_make, car_model, car_capacity)
              VALUES ('$userId', '$carMake', '$carModel', '$carCapacity')";
    mysqli_query($conn, $query);

    // Redirect to the home page
    header("Location: home.php");
    exit();
}
?>
