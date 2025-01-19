<?php

session_start();
$conn = 
mysqli_connect('localhost','root','','seproject') or die('Unable to connect');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.history.forward();
    </script>
</head>
<body>
    <h2>Airline management system</h2>
    <div>
        <form action="login.php" method="post">
        Username:<input type="text" name="username" required><br>
        Password:<input type="password" name="password" required><br>
        <input type="submit" name="login" value="login">
</form>
</div>

<?php

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

$select=mysqli_query($conn,"select * from login where BINARY username='$username' AND BINARY password='$password'");
$row=mysqli_fetch_array($select);


if(is_array($row)){
    $_SESSION["username"]=$row['username'];

}
else{
    echo'<script type="text/javascript">';
    echo'alert("invalid username or password");';
    echo'window.location.href="login.php"';
    echo'</script>';
}
}


if(isset($_SESSION["username"])){
    header("location:home.php");
}
?>
</body>
</html>