<?php



$file = $_REQUEST["filename"];

$team_log_contents = file_get_contents($file);
$team_log_contents1 = preg_replace_callback('~((\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}))~', "into_user_timezone", $team_log_contents);
$team_log_contents2 = preg_replace_callback('~((\d{2})\s([a-zA-Z]{3}),\s(\d{2}),\s(\d{2}):(\d{2}):(\d{2})\s([a|p][m]))~', "into_user_timezone", $team_log_contents1);
file_put_contents($file,$team_log_contents2);



function into_user_timezone($matches)
{
	//return "----------".$matches[1]."----------";
	$my_time_format = getMyTime(str_replace(","," ",$matches[1]),$_SESSION["userTimezone"]);
	return date("d F, Y, h:i:s a",strtotime($my_time_format));
}


function getMyTime($timeset,$tzdiff)
{
	return date("Y-m-d H:i:s",strtotime($timeset." ".$tzdiff." MINUTES"));
}

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>