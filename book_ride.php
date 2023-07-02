<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if ride ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: view_rides.php");
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
    <title>Ride Sharing Application - Book Ride</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Book Ride</h1>
    </header>

    <div class="container">
        <h2>Ride Details</h2>
        <p><strong>From:</strong> <?php echo $row['from_location']; ?></p>
        <p><strong>To:</strong> <?php echo $row['to_location']; ?></p>
        <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
        <p><strong>Time:</strong> <?php echo $row['time']; ?></p>
        <p><strong>Capacity:</strong> <?php echo $row['capacity']; ?></p>

        <form method="post" action="book_ride_process.php">
            <input type="hidden" name="ride_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn">Book Ride</button>
        </form>
    </div>
</body>
</html>
