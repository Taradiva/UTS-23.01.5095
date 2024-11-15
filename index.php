<?php 
session_start();

$akses = @$_SESSION["akses"];

if($akses == true)
{
    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="login-form">
        <form action="controller.php" method="POST">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="inputbox">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bx-key'></i>
            </div>
            <div class="check-box">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn" name="login" method="GET">Login</button>
            <div class="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

</body>

</html>