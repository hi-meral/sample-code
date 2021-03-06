<?php
function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1')
{
	//create the URL
	$bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
	
	//get the url
	//could also use cURL here
	$response = file_get_contents($bitly);
	
	//parse depending on desired format
	if(strtolower($format) == 'json')
	{
		$json = @json_decode($response,true);
		return $json['results'][$url]['shortUrl'];
	}
	else //xml
	{
		$xml = simplexml_load_string($response);
		return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
	}
}

/* usage */
$short = make_bitly_url('http://hcare.sagesurfer.com/phpinfo.php','o_1gtbidubou','R_2ddb48941f7f4e34a5f7e435ee7fdfd2','json');
echo 'The short URL is:  <a href='.$short.' target="_blank" >'.$short.'</a>'; 
	
?>


