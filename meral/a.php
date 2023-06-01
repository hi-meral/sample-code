<?php<?php


	$hours = new stdClass();
	$hours->mon = "0";
	$hours->tue = "0";
	$hours->wed = array("09:00 AM – 07:00 PM");
	$hours->thu = array("09:00 AM – 07:00 PM");
	$hours->fri = array("09:00 AM – 07:00 PM");
	$hours->sat = array("09:00 AM – 07:00 PM");
	$hours->sun = array("10:00 AM – 07:00 PM");

	
	$start_day = "mon";
	$end_day = "mon";
	$temp_hour = $hours->mon;
	
	
	print_r($hours);
	
	foreach($hours as $day=>$hour){

		if($hour != $temp_hour)
		{
			echo printHour($start_day,$end_day,$temp_hour);
			echo "<br>";
			
			$start_day = $day;
			$temp_hour = $hour;
		}
		
		$end_day = $day;
		
	}
	
	echo printHour($start_day,$end_day,$temp_hour);
	echo "<br>";
	

function printHour($start_day,$end_day,$hour){
	

	$return = $start_day;
	if($start_day != $end_day){
		$return .= ucwords($start_day)."-".ucwords($end_day);
	}
	
	if(is_array($hour)){
		$return .= " : ". $hour[0];
	} else {
		$return .= ": Closed";
	}
	
	return $return;
}

?>