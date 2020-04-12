<?php

$cnt = mysql_connect("localhost","root","");

mysql_select_db("test");


$today = date("Y-m-d H:i:s");

echo $qry = "INSERT INTO timetest VALUES ('meral','".$today."')";
mysql_query($qry);





