
<?php
$conn = mysqli_connect("localhost", "ride","Ride#987", "ride_sharing_app");
session_start();
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
}

//echo "Success: A proper connection to MySQL was made!";
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
error_reporting(E_ALL ^ E_NOTICE); //to remove notices
error_reporting(E_ERROR | E_PARSE);

?>
