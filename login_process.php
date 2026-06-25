<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    //check usernameand password from theuser table

    $sql="SELECT * FROM users WHERE username='$username' AND  password='$password' ";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        $user=mysqli_fetch_assoc($result);

        //generate otp of 6 digits
        $otp=random_int(100000,999999);

        //otp valid for 5minutes only
        $otp_expiry=date("Y-m-d H:i:s",strtotime("+5 minutes"));

        //save otp in users table

        $update_sql="UPDATE users SET otp='$otp', otp_expiry='$otp_expiry'
                                            WHERE id='".$user["id"]."' ";

        mysqli_query($conn, $update_sql);

        //save user id temporarily
        $_SESSION["user_id"]=$user["id"];

        //show otp on onscreen
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Generated</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="otp-container">
        <h1>OTP Generated</h1>

        <p class="otp-message">Your OTP is:</p>

        <div class="otp-box"><?php echo $otp; ?></div>

        <a href="otp_verify.php" class="otp-button">Enter OTP</a>
    </div>

</body>
</html>
<?php

    }else{?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Login Failed</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="message-container error-box">
                <h1>Login Failed</h1>

                <p class=message-text>Invalid username or password</p>
                <a href="login.php" class="message-button">Try Again</a>
            </div>

        </body>
    </html>
        
    <?php }
}else{
    header('Location:login.php');
}
?>