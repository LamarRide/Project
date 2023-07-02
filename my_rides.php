<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Retrieve and display the booked rides
$bookedQuery = "SELECT rides.*, bookings.id AS booking_id FROM rides
                INNER JOIN bookings ON rides.id = bookings.ride_id
                WHERE bookings.user_id = '$userId'";
$bookedResult = mysqli_query($conn, $bookedQuery);

// Retrieve and display the created rides
$createdQuery = "SELECT * FROM rides WHERE user_id = '$userId'";
$createdResult = mysqli_query($conn, $createdQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - My Rides</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>My Rides</h1>
    </header>

    <div class="container">
        <h2>Booked Rides</h2>
        <?php if (mysqli_num_rows($bookedResult) > 0) { ?>
            <table>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($bookedResult)) { ?>
                    <tr>
                        <td><?php echo $row['from_location']; ?></td>
                        <td><?php echo $row['to_location']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['capacity']; ?></td>
                        <td>
                            <a href="cancel_booking.php?id=<?php echo $row['booking_id']; ?>" class="btn">Cancel Booking</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No rides booked at the moment.</p>
        <?php } ?>

        <h2>Created Rides</h2>
        <?php if (mysqli_num_rows($createdResult) > 0) { ?>
            <table>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($createdResult)) { ?>
                    <tr>
                        <td><?php echo $row['from_location']; ?></td>
                        <td><?php echo $row['to_location']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['capacity']; ?></td>
                        <td>
                            <a href="edit_ride.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                            <a href="delete_ride.php?id=<?php echo $row['id']; ?>" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No rides created at the moment.</p>
        <?php } ?>
    </div>
</body>
</html>
