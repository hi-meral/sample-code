<?php

error_reporting(0);


mysql_connect("localhost","root","");
mysql_select_db("test");

$m = 1;
include_once("csvpersor.php");
$csvFilePath = "Book4.csv";

$csvPersor = new CsvFileParser();


$csContentsArray = $csvPersor->ParseFromFile($csvFilePath);


$countyDataArray = $csvPersor->data;

for($i=0; $i<count($countyDataArray); $i++)
{
	$countyData = $countyDataArray[$i];
	
	echo $qry = "INSERT INTO county_master (county_number,county_name,state_name) VALUES ('".$countyData[0]."','".$countyData[1]."','".$countyData[2]."')";
	echo "<br>";
	mysql_query($qry);
	
}