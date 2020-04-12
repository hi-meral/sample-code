<?php
error_reporting(0);
session_start();



//mysql_connect("localhost","root","");
mysql_select_db("test",$_SESSION["LINK"]);

//$mysqli->commit();

if ($result = mysql_query("SELECT * FROM temp")) {

    while ($row = mysql_fetch_assoc($result)) {
        printf ("%s \n", $row["name"]);
    }
    $result->close();
} 
