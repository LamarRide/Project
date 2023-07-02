<?php
session_start();

// Include the config.php file
require_once 'config.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    echo $query;
    echo 'mysqli_query($conn, $query)';
    $result = mysqli_query($conn, $query);
    echo $result;
    if (mysqli_num_rows($result) === 1) {
        // User found, set session variables and redirect to home page
        echo "hello";
	$user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: home.php");
        exit();
    } else {
        // User not found, display error message
        $error = "Invalid email or password. Please try again.";
    }
}
?>
