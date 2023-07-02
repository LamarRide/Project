<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve and display the available rides
$query = "SELECT * FROM rides";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - View Rides</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Available Rides</h1>
    </header>

    <div class="container">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['from_location']; ?></td>
                        <td><?php echo $row['to_location']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['capacity']; ?></td>
                        <td>
                            <a href="book_ride.php?id=<?php echo $row['id']; ?>" class="btn">Book</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No rides available at the moment.</p>
        <?php } ?>
    </div>
</body>
</html>
