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
        // creating the filename with the uploading time
        $file_name=time()."_".basename($_FILES[$photoName]['name']);
        
        //create full path
        $target_file=$photo_folder.$file_name;

        //move upload photos to uploads folder
        //move an uploaded file from php's temp folder to our own folder 
        if(move_uploaded_file($_FILES[$photoName]['tmp_name'],$target_file)){
            return $target_file; // this will return to the final place where we want to save the photo
        }

    }
    return "";// if the photo didnt upload (upload fails) return empty value

}
//upload each photo and save its path in each photo accordingly 
$photo1=uploadPhoto("photo1",$photo_folder);
$photo2=uploadPhoto("photo2",$photo_folder);
$photo3=uploadPhoto("photo3",$photo_folder);

//insert the form data into disaster_reports table
$sql="insert into disaster_reports
(name,tel,disaster,geotag,photo1,photo2,photo3)
values
('$name','$tel','$disaster','$geotag','$photo1','$photo2','$photo3')";

if(mysqli_query($conn,$sql)){
    echo "Report Submitted";
    echo "<a href='index.php'>";
}


?>