<?php
session_start();

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

// Retrieve and display the ride details
$query = "SELECT * FROM rides WHERE id = '$rideId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Edit Ride</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Edit Ride</h1>
    </header>

    <div class="container">
        <form method="post" action="edit_ride_process.php">
            <input type="hidden" name="ride_id" value="<?php echo $row['id']; ?>">

            <label for="from">From:</label>
            <input type="text" id="from" name="from" value="<?php echo $row['from_location']; ?>" required>

            <label for="to">To:</label>
            <input type="text" id="to" name="to" value="<?php echo $row['to_location']; ?>" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo $row['time']; ?>" required>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" value="<?php echo $row['capacity']; ?>" required>

            <button type="submit" class="btn">Update Ride</button>
        </form>
    </div>
</body>
</html>
