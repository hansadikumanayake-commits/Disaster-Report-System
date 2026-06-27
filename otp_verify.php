<?php
//to remeber the user after usernmae and passwords are correct
session_start();

//check whether user came after login process
//If user_id is not saved in session, send the user back to login.php.
if(!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>OTP Verification</title>
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>
        <div class="otp-container">
            <h1>OTP Verification</h1>
            <p clss="otp-message">Enter the OTP shown on the screen</p>

    <!--When admin clicks Verify OTP, send the OTP to otp_process.php.-->
    <form action="otp_process.php" method="post">
        <input type="text" placeholder="Enter the otp here" name="otp" required>
        <br><br>
        <button type="submit" class="otp-button">Verify OTP</button>
    </form>
        </div>
    </body>
</html>