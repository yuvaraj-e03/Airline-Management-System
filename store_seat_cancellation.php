<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat_id = $_POST['seat_id'];
    $_SESSION['cancelled_seat'] = $seat_id;
    echo "Seat cancellation stored in session";
}
?>