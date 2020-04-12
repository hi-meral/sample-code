<?php


echo getMyTime('2014-06-17 13:18:57',getTimeZoneByIp());


function getMyTime($timeset,$tzdiff)
{
	return date("Y-m-d H:i:s",strtotime($timeset." ".$tzdiff." MINUTES"));
}

function getTimeZoneByIp()
{
	
	$myIp = get_public_ip_address();
	
	$tags = get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress='.$myIp);

	
	$tz = explode(':',$tags['timezone']);
	$tzsign = substr($tz[0],0,1);
	$tzhour = substr($tz[0],1);
	$tzminute = $tz[1];

	return $tzsign.(($tzhour*60)+$tzminute);

}

function get_public_ip_address()
{
	// TODO: Add a fallback to http://httpbin.org/ip
	// TODO: Add a fallback to http://169.254.169.254/latest/meta-data/public-ipv4

	$url="simplesniff.com/ip";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}
