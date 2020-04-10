<?php
/*
This is usefull when you are downloading big files, as it
will prevent time out of the script :
*/
function file_get_contents_curl($url) {
    $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
}


//$url = 'https://api.twilio.com/2010-04-01/Accounts/ACf4db7f12099e1a22cea50f0a1242c079/Recordings/REaa2f20997f4b5c6b0b0fe3ecf3eedbb7.wav';
 $url = 'http://www.externalharddrive.com/waves/animal/bird.wav';
$head = array_change_key_case(get_headers($url, TRUE));


header("Content-type:".$head['content-type']);
//header("Content-type:x-www-form-urlencoded");

//header("Content-Transfer-Encoding: binary");

header("Content-Length:".$head['content-length']);
//header("Content-Range:bytes 32056-32056/1334316");




echo file_get_contents_curl($url);
exit;

// set_time_limit(0);
// ini_set('display_errors',true);//Just in case we get some errors, let us know....

// //$fp = fopen (dirname(__FILE__) . '/my.wav', 'w+');//This is the file where we save the information
// $ch = curl_init($url);//Here is the file we are downloading
// curl_setopt($ch, CURLOPT_TIMEOUT, 50);
// //curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_exec($ch);
// curl_close($ch);
// fclose($fp);
?>