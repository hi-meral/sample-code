<?php


//echo date("D F Y",strtotime("14 Dec 2015 03:50:03 pm"));
//exit;
$path_to_file = '123.doc';
$file_contents = file_get_contents($path_to_file);
$file_contents1 = preg_replace_callback('~((\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}))~', "into_user_timezone", $file_contents);
$file_contents2 = preg_replace_callback('~( (\d{2})\s([a-zA-Z]{3}),\s(\d{2}),\s(\d{2}):(\d{2}):(\d{2})\s([a|p][m]))~', "into_user_timezone", $file_contents1);
file_put_contents($path_to_file,$file_contents2);

function into_user_timezone($matches)
{
  return date("D F Y",strtotime( str_replace(","," ",$matches[1]))); 
}

exit;



$file_contents = "adfs sdfd sf 14 Dec, 15, 03:50:03 pm sdfd sf dsf ds dsf sd ";
echo $file_contents1 = preg_replace_callback('~( (\d{2})\s([a-zA-Z]{3}),\s(\d{2}),\s(\d{2}):(\d{2}):(\d{2})\s([a|p][m]))~', "into_user_timezone2", $file_contents);
//file_put_contents($path_to_file,$file_contents1);

function into_user_timezone2($matches)
{
  // as usual: $matches[0] is the complete match
  // $matches[1] the match for the first subpattern
  // enclosed in '(...)' and so on
  
  return "--------".$matches[0]."------------------";
  //return date("D F Y",strtotime($matches[1]));
  
}
?>
