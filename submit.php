<?php
//connect the php to database
include 'db.php';
 

//getting form data

$name=$_POST["name"];
$tel=$_POST["tel"];
$disaster=$_POST["disaster"];
$geotag=$_POST["geotag"];
//save the uploaded photos inside the upload folder

$photo_folder="uploads/";


?>