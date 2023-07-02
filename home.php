<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve and display user's published car details
$query = "SELECT * FROM cars WHERE user_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Welcome to the Ride Sharing Application</h1>
        <p>
            Logged in as: <?php echo $_SESSION['username']; ?>
            <a href="logout.php" class="link">Logout</a>
        </p>
    </header>

    <div class="container">
        <h2>My Car Details</h2>
        <?php if ($row) : ?>
            <p>
                Car Make: <?php echo $row['car_make']; ?><br>
                Car Model: <?php echo $row['car_model']; ?><br>
                Car Capacity: <?php echo $row['car_capacity']; ?><br>
            </p>
            <p>
                <a href="edit_car_details.php" class="link">Edit Car Details</a>
            </p>
        <?php else : ?>
            <p>You have not published any car details yet.</p>
            <p>
                <a href="publish_car_details.php" class="link">Publish Car Details</a>
            </p>
        <?php endif; ?>

        <h2>Ride Actions</h2>
        <p>
            <a href="create_ride.php" class="link">Create a Ride</a><br>
            <a href="my_rides.php" class="link">View My Rides</a><br>
            <a href="my_bookings.php" class="link">View My Bookings</a><br>
        </p>

        <h2>Ride Requests</h2>
        <p>
            <a href="ride_requests.php" class="link">View Ride Requests</a><br>
        </p>
    </div>
</body>
</html>
