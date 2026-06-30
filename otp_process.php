<?php
session_start();
include 'db.php';

//checking whether the user_id is available in the session(user came after login)
if(!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}

//get the otp entered by the user
$entered_otp=$_POST['']


?>