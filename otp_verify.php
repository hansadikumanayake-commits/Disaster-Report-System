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
    </head>
    <body>
    <form action="login_process.php" method="post">

    </form>
    </body>
</html>
