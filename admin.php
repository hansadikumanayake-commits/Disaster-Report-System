<!--admin panel created in here-->
<?php

//include the database connection file
include 'db.php';

//getting all the  disaster reports from database
$sql="select * from disaster_reports order by created_at desc";
$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">

        <!--make web page repsnsive for mobile and desktop screens-->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>Admin Panel</title>

        <!--link external css file for styling-->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Admin Panel - Disaster Reports</h1>

    <div class="report-list">
        <?php
        // get row from database as result by accessing values using column names as array 
        //loop through each report from database
        while($row=mysqli_fetch_assoc($result)){ 
        ?>

        <div class="report-card">
            <h3>Report ID: 
                <?php
                //id value will be displayed
                echo $row['id'];
                ?>
            </h3>
        
            <!--display the name-->
            <p><strong>Name:</strong>
            <?php
                echo $row['name'];
            ?></p>

            <!--display the contact number-->
            <p><strong>Contact Number:</strong>
            <?php
                echo $row['tel'];
            ?></p>

            <!--display the disaster type-->
            <p><strong>Disaster Type:</strong>
            <?php
                echo $row['disaster'];
            ?></p>

            <!--display the geotag (info of the photo)-->
            <p><strong>GeoTag:</strong>
            <?php
                echo $row['geotag'];
            ?></p>

            <!--display the submitted date -->
            <p><strong>Submitted Date:</strong>
            <?php
                echo $row['created_at'];
            ?></p>

            <h4>Uploaded photos</h4>
            <div class="photo-gallery">

                <?php
                    if(!empty($row['photo1'])){ ?>
                        <img src="<?php echo $row['photo1'];?>" alt="Disaster Photo 1">
                   <?php } 
                ?>

                <?php
                    if(!empty($row['photo2'])){ ?>
                        <img src="<?php echo $row['photo2'];?>" alt="Disaster Photo 2">
                   <?php } 
                ?>

                <?php
                    if(!empty($row['photo3'])){ ?>
                        <img src="<?php echo $row['photo3'];?>" alt="Disaster Photo 3">
                   <?php }
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <!--link back to the disaster report form-->
    <a href="index.php">Back to Form</a>

    </body>
</html>

<?php
mysqli_close($conn);
?>