<?php
session_start();

// Include the config.php file
require_once 'config.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert user data into the database
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    //echo $query;
    mysqli_query($conn, $query);

    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>
