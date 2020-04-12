<?
//This is your source file path  
$source_file = "happy-birthday.jpg";  

list($img_width,$img_height) = getimagesize($source_file);

//Create a new true color image  
$im = @imagecreatetruecolor($img_width, $img_height) or die('Cannot Initialize new GD image stream');

//Create a new image from file or URL 
$img_source = imagecreatefromjpeg($source_file);

imagecopyresampled($im, $img_source, 0, 0, 0, 0, $img_width, $img_height, $img_width, $img_height);
 
imagejpeg($im, "small-0-".$source_file, 50);

?>