<?php
session_start();
session_destroy();

header("Location:login.php");
exit();
//this is creted incase if a session is active inorder to logout of it 
?>