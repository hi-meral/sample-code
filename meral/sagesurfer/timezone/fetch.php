<?php

$cnt = mysql_connect("localhost","root","");

mysql_select_db("test");


#################

# user 1 
# time zone : + 1 hour

 

$selqry = "select name, timetest, DATE_ADD(timetest,INTERVAL +330 MINUTE) as timetest1  from timetest";

$selrs = mysql_query($selqry);


echo "<h1>Indian User</h1>";

while($sel = mysql_fetch_assoc($selrs))
{

	echo getMyTime($sel["timetest"],"+330");
	echo "<br>";
	echo $sel["timetest1"];
	echo "<br><br>";
	
}


echo "<br><br><br><br><hr>";
#################

# user 1 
# time zone : + 1 hour

 

$selqry = "select name, timetest, DATE_ADD(timetest,INTERVAL -240 MINUTE) as timetest1  from timetest";

$selrs = mysql_query($selqry);


echo "<h1>Atlantic User</h1>";


while($sel = mysql_fetch_assoc($selrs))
{

	echo getMyTime($sel["timetest"],"-240");
	echo "<br>";
	echo $sel["timetest1"];
	echo "<br><br>";
	
}

function getMyTime($timeset,$tzdiff)
{
	return date("Y-m-d H:i:s",strtotime($timeset." ".$tzdiff." MINUTES"));
}
