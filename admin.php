//admin panel created in here
<?php
//getting all the  disaster reports from database
$sql="select * from disaster_reports order by created_at desc";
$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Admin Panel - Disaster Reports</h1>
        // get row from database as result by accessing values using column names as array 

        <?php
        while($row=mysqli_fetch_assoc($result))
        ?>

        <div></div>



    </body>
</html>