<?php
session_start();
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
   header('Cache-Control: post-check=0, pre-check=0', false);
   header('Pragma: no-cache');
   if(!$_SESSION["username"]){
    header("location:login.php");
    die();
   }

?>
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
                <li><a href="#">Home</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="myflights.php">My Flights</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form action="logout.php" method="post">
                <li><a href="logout.php"><button class="logout_btn"><span class="glyphicon glyphicon-log-in"></span> Logout</button></a></li>
                
                </form>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="main-content">
    <!-- Main content will be loaded here -->
    <h1>Welcome to RY-Airlines</h1>
    <p>Your trusted airline for reliable and comfortable travel.</p>
</div>
<script>
    const logoutbtn = document.querySelector(".logout_btn")
    logoutbtn.addEventListener("click",()=>{
      window.history.forward("login.php")
})

</script>
</body>
</html>
