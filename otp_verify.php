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