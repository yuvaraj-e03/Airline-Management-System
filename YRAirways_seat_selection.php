<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <style>
        .seat-matrix {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 100px;
            border: 1px solid black;
            border-radius: 100rem;
        }
        .seat {
            width: 50px;
            height: 50px;
            border:none;
            margin: 5px;
            display: inline-block;
            text-align: center;
            line-height: 50px;
            background:transparent;
        }
    
        img{
            width:40px;
            height:40px;
        }
        button {
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .submitBtn {
            font-size: larger;
            margin-left: 40rem;
            border: 2px solid burlywood;
        }
        .occupied button{
            background-color:red;
            pointer-events:none;
            cursor:not-allowed;
        }
        
        .selected button{
            background-color:green;
        }
    </style>
</head>
<body>
<h2>Select Your Seat</h2>
    <div id="seats">
<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'seproject');
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Fetching all seats from database
$sql = "SELECT * FROM YRAirways";
$result = mysqli_query($connection, $sql);
$_SESSION["airlinename"]="YRAirways";
echo "<div class='seat-matrix'>
<div class='row'>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $seat_id = $row["id"];
        $status = $row["status"];
        $class = $status == 'available' ? 'available' : 'occupied';
        echo "<div class='seat $class' data-seatid='$seat_id'><button onclick='colorchange(this)'><img src='seat icon.jpg' alt='Seat' /> $seat_id</button></div>";
    }
    echo "</div>
    </div>";
    echo "<button id='submitBtn' style='border:2px solid'>Select!</button>";
} else {
    echo "0 results";
}

$connection->close();
?>

<script>
function colorchange(button) {
    var seatDiv = button.closest('.seat');
    var seatId = seatDiv.getAttribute('data-seatid');

    // Temporarily change color locally
    seatDiv.classList.toggle('available');
    seatDiv.classList.toggle('selected');

    // Store seat selection in session
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Seat selection stored successfully");
        }
    };
    xhttp.open("POST", "store_seat_selection.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("seat_id=" + seatId);
}

document.getElementById("submitBtn").addEventListener("click", function() {
    window.location.href = 'payment.html';
});
</script>
