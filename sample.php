<?php
$connection = mysqli_connect('localhost', 'root', '', 'seproject');
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

$board = $_POST['from'];  
$depart = $_POST['to'];  
$da = $_POST['departureDate']; 


$sql = "SELECT airlinename, boarding, destination,tim FROM airline WHERE boarding = '$board' AND destination = '$depart' AND dat='$da'";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table ><tr>
        <th>Airline Name</th>
		<th>From</th>
		<th>To</th>
		<th>Departure Date AND Time</th>
		</tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $airline=$row['airlinename'];
        echo "<tr class='text-center'>                  
          <td>".$row['airlinename']."</td>
          <td>".$row['boarding']."</td>
          <td>".$row['destination']."</td>
          <td>".$row['tim']."</td>
          <td><button id='$airline' onclick='TakeMe(this)'> Book Seats </button></td>
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
        "NKAirways": "NKAirways_seat_selection.php",
        "YRAirways": "YRAirways_seat_selection.php",
        
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

