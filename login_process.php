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
    }
}
?>