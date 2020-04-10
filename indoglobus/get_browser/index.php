<?php

$x = get_browser_properties();

echo "<pre>";
print_r($x);

function get_browser_properties(){

$browser =array();

$agent=$_SERVER['HTTP_USER_AGENT'];


if(stripos($agent,"Firefox")!==false){

$browser['browser'] = 'Firefox'; // Set Browser Name

$domain = stristr($agent, 'Firefox');

$split =explode('/',$domain);

$browser['version'] = $split[1]; // Set Browser Version

return $browser;

}

if(stripos($agent,"Edge")!==false){

$browser['browser'] = 'Edge'; // Set Browser Name

$domain = stristr($agent, 'Edge');

$split =explode('/',$domain);

$browser['version'] = $split[1]; // Set Browser Version

return $browser;

}

if(stripos($agent,"OPR")!==false){

$browser['browser'] = 'Opera'; // Set Browser Name

$domain = stristr($agent, 'OPR');

$split =explode('/',$domain);

$browser['version'] = $split[1]; // Set Browser Version

return $browser;

}

if(stripos($agent,"Chrome")!==false){

$browser['browser'] = 'Google Chrome'; // Set Browser Name

$domain = stristr($agent, 'Chrome');

$split1 =explode('/',$domain);

$split =explode(' ',$split1[1]);

$browser['version'] = $split[0]; // Set Browser Version

return $browser;

}

else if(stripos($agent,"Safari")!==false){

$browser['browser'] = 'Safari'; // Set Browser Name

$domain = stristr($agent, 'Version');

$split1 =explode('/',$domain);

$split =explode(' ',$split1[1]);

$browser['version'] = $split[0]; // Set Browser Version

return $browser;

}


if(stripos($agent,"Trident")!==false){

$browser['browser'] = 'Internet Explorer'; // Set Browser Name

$domain = stristr($agent, 'Trident');

$split =explode(' ',$domain);

$browser['version'] = $split[1]; // Set Browser Version

return $browser;

}



}