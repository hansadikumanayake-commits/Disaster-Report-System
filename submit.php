<?php
//connect the database
include 'db.php';
 

//getting form data
$name=$_POST["name"];
$tel=$_POST["tel"];
$disaster=$_POST["disaster"];
$geotag=$_POST["geotag"];

//save the uploaded photos inside the upload folder
$photo_folder="uploads/";

//function to upload photo
function uploadPhoto($photoName,$photo_folder){
//to check whether photo is uploaded correctly
// 1 check whether file input exists
// 2 check whether uplaod had no error
    if(isset($_FILES[$photoName])&& $_FILES[$photoName]['error']==0){
        
    }
}

?>