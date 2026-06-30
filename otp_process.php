<?php
session_start();
include 'db.php';

//checking whether the user_idis available in the session
if(!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}


?>