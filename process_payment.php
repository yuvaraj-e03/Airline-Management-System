<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $seat_id = $_SESSION['selected_seat'];
    $connection = mysqli_connect('localhost', 'root', '', 'seproject');
    $username = $_SESSION["username"];
    $db=$_SESSION["airlinename"];
    echo "$username";
    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    header('location:home.php');
    $sql = "UPDATE $db SET status='occupied' WHERE id='$seat_id'";
    if (mysqli_query($connection, $sql)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }

    $sql2= "UPDATE $db SET bookedby='$username' WHERE id='$seat_id'";
    if (mysqli_query($connection, $sql2)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }
    $sql3="INSERT INTO $username VALUES('$db')";
    if (mysqli_query($connection, $sql3)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }

    mysqli_close($connection);

    // Clear the session variable after updating
    unset($_SESSION['selected_seat']);
    unset($_SESSION['airlinename']);
    
    exit();
}
?>
