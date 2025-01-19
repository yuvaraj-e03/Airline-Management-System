<?php
session_start();
    $seat_id = $_SESSION['cancelled_seat'];
    $connection = mysqli_connect('localhost', 'root', '', 'seproject');
    $username = $_SESSION["username"];
    $db=$_SESSION["airlinename"];
    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    header("location:home.php");
    $sql = "UPDATE $db SET status='available' WHERE id='$seat_id'";
    if (mysqli_query($connection, $sql)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }

    $sql2= "UPDATE $db SET bookedby='null' WHERE id='$seat_id'";
    if (mysqli_query($connection, $sql2)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }
    
    $sql3="DELETE FROM $username WHERE airlinename='$db'";
    if (mysqli_query($connection, $sql3)) {
        echo "Payment was successfull";
    } else {
        echo "Error updating seat status: " . mysqli_error($connection);
    }

    mysqli_close($connection);

    // Clear the session variable after updating
    unset($_SESSION['cancelled_seat']);
    unset($_SESSION['airlinename']);
    

    exit();

?>