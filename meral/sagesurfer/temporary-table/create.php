<?php


error_reporting(0);
session_start();

$_SESSION["LINK"] = $link = mysql_pconnect("localhost","root","");
mysql_select_db("test",$link);

mysql_query("CREATE TEMPORARY TABLE CITIES (
  id int(11) NOT NULL,
  name varchar(64) NOT NULL
)");

//$mysqli->autocommit(FALSE);

echo mysql_query("INSERT INTO CITIES VALUES ('1', '".$_GET['p']."')");












