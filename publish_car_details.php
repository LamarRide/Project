<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if user has already published car details
$query = "SELECT * FROM cars WHERE user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Publish Car Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Publish Car Details</h1>
    </header>

    <div class="container">
        <form method="post" action="publish_car_details_process.php">
            <label for="car_make">Car Make:</label>
            <input type="text" id="car_make" name="car_make" required>

            <label for="car_model">Car Model:</label>
            <input type="text" id="car_model" name="car_model" required>

            <label for="car_capacity">Car Capacity:</label>
            <input type="number" id="car_capacity" name="car_capacity" required>

            <button type="submit" class="btn">Publish Car Details</button>
        </form>
    </div>
</body>
</html>
