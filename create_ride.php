<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Create a Ride</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Create a Ride</h1>
    </header>

    <div class="container">
        <form method="post" action="create_ride_process.php">
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>

            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>

            <button type="submit" class="btn">Create Ride</button>
        </form>
    </div>
</body>
</html>
