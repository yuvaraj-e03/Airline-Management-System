<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Cancellation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .confirmation-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #d9534f;
        }
        p {
            color: #5a5a5a;
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-no {
            background-color: #6c757d;
        }
        .btn-no:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Confirm Cancellation</h1>
        <p>Are you sure you want to cancel?</p>
        <div class="btn-container">
            <a href="seat_cancellation_update.php" class="btn">Yes</a>
            <a href="index.html" class="btn btn-no">No</a>
        </div>
    </div>
</body>
</html>
