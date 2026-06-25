<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    //check usernameand password from theuser table

    $sql="SELECT * FROM users WHERE username='$username' AND password=$password";
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

        //show otp on onscreen
       echo  "<h2>Your OTP: $otp</h2>";
        echo "<a href='otp_verify.php'>Enter your OTP</a>";

    }else{
        echo "Invalid username or password";
        echo "<a href='login.php'>Try Again</a>";
    }
}else{
    header('Location:login.php');
}
?>