<?php
    //database server name
    $db_server="localhost";

    //database username
    $db_user="root";

    //database password
    $db_pass="";

    //name of the database to be connected
    $db_name="disaster_report";

    //variable to store database connection
    $conn="";

    try{
        //create connection with mysql database
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }
//if the database couldnt connect
    catch(mysqli_sql_exception){
        echo "could not connect <br>";
    }
    //check if the connection is not successful
    if(!$conn){
        echo "database not connected";
    }

?>