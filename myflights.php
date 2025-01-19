<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RY-Airlines</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="border-radius:0px !important; margin: 0px;border: 0px">
    <div class="container-fluid">
        <a class="navbar-brand" href="devleoper.html" id="ry-airlines-link">RY-Airlines</a>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="#">My Flights</a></li>
                
            </ul>
            </form>
        </div>
    </div>
</nav>
    </body>
    </html>

<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'seproject');
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$username=$_SESSION["username"];
echo "$username";

$sql = "SELECT airlinename FROM $username";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table ><tr>
        <th>Airline Name</th>
		<th>From</th>
		<th>To</th>
		<th>Departure Date</th>
		</tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $airline=$row['airlinename'];
        echo "<tr class='text-center'>                  
          <td>".$row['airlinename']."</td>
          <td>".$row['boarding']."</td>
          <td>".$row['destination']."</td>
          <td>".$row['dat']."</td>
          <td><button id='$airline' onclick='TakeMe(this)'> Cancel Seats </button></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
mysqli_close($connection);
?>
<script>
    // Mapping of airline names to their respective PHP files
    const airlineToFileMap = {
        "NKAirways": "NKAirways_cancel_seat.php",
        "YRAirways": "YRAirways_cancel_seat.php",
        
    };

    function TakeMe(button) {
        var airlineName = button.id;
        var targetFile = airlineToFileMap[airlineName];
        if (targetFile) {
            window.location.href = targetFile;
        } else {
            alert("No seat selection page found for this airline.");
        }
    }
</script>


