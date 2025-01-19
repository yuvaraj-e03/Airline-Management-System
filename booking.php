<?php
session_start();

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Flight Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #fff;
        }
        .navbar {
            background-color: #10100f;
            border: none;
            border-radius: 0;
        }
        .navbar-brand,
        .navbar-nav > li > a {
            color: #ffffff !important;
            font-weight: bold;
        }
        .navbar-nav li.active > a {
            color: #333 !important;
        }
        .navbar-right {
            float: right;
            margin-right: 20px;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background: #807f7f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 0, 0.5);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD400;
        }
        .form-group label {
            font-weight: bold;
            color: #ffffff;
        }
        .form-control {
            background-color: #444;
            color: #FFD400;
            border: 1px solid #FFD400;
        }
        .form-control::placeholder {
            color:#FFD400;
        }
        .btn-primary {
            background-color: #FFD400;
            border: none;
            color: #333;
        }
        .btn-primary:hover {
            background-color: #FFD400;
        }
        .btn-block {
            display: block;
            width: 100%;
            margin-top: 20px;
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
                    <li><a href="#">Booking</a></li>
                    <li><a href="myflights.php">My Flights</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>New Flight Booking</h2>
        <hr>
        <form action="sample.php" method="post" id="bookingForm">
            <div class="form-group">
                <label for="from">From:</label>
                <input type="text" class="form-control" name="from" placeholder="Origin" required>
            </div>
            <div class="form-group">
                <label for="to">To:</label>
                <input type="text" class="form-control" name="to" placeholder="Destination" required>
            </div>
            <div class="form-group">
                <label for="departureDate">Departure Date:</label>
                <input type="date" class="form-control" name="departureDate" required>
            </div>
            <div class="form-group">
                <label for="departureTime">Departure Time:</label>
                <input type="time" class="form-control" name="departureTime">
            </div>
            
            
            <button type="submit" class="btn btn-primary btn-block" >Search</button>
        </form>
    </div>
</html>
