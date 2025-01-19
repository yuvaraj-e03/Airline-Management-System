<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat_id = $_POST['seat_id'];
    $_SESSION['selected_seat'] = $seat_id;
    echo "Seat selection stored in session";
}
?>
