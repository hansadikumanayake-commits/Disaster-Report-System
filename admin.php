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

            <!--display the incident district-->
            <p><strong>District:</strong>
            <?php
                echo $row['district'];
            ?></p>

            <!--display grama niladhari division of the incident location-->
            <p><strong>Grama-Niladhari Division:</strong>
            <?php
                echo $row['gn'];
            ?></p>

            <!--display the submitted date -->
            <p><strong>Submitted Date:</strong>
            <?php
                echo $row['created_at'];
            ?></p>

            <h4>Uploaded photos</h4>
            <div class="photo-gallery">

                <?php
                    // Check whether photo1 exists before displaying it
                    if(!empty($row['photo1'])){ ?>
                    <!--display the 1st uploaded photo-->
                        <img src="<?php echo $row['photo1'];?>"  alt="Disaster Photo 1">
                   <?php } 
                ?>

                <?php
                //checknwhether photo2 before displaying it 
                    if(!empty($row['photo2'])){ ?>
                    <!--display the 2nd uploaded photo-->
                        <img src="<?php echo $row['photo2'];?>"  alt="Disaster Photo 2">
                   <?php } 
                ?>

                <?php
                //check whether photo3 before  displaying it
                    if(!empty($row['photo3'])){ ?>
                    <!--display the 3rd uploaded photo-->
                        <img src="<?php echo $row['photo3'];?>"  alt="Disaster Photo 3">
                   <?php }
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <!--link back to the disaster report form-->
    <div class="back-btn-container">
    <a class="back-btn" href="index.php">Back to Form</a></div>

    </body>
</html>

<?php
mysqli_close($conn);
?>