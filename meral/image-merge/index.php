<?php

#####

$watermark = imagecreatefromjpeg('b.jpg');   

$watermark_width = imagesx($watermark);   
$watermark_height = imagesy($watermark);   

#####

$image = imagecreatetruecolor($watermark_width, $watermark_height);   
$image = imagecreatefromjpeg('a.jpg');   

$image_width = imagesx($image);   
$image_height = imagesy($image);

####

$top = ($image_height-$watermark_height);
$left = ($image_width-$watermark_width);

$top = 10;
$left = 0;

####

imagecopyresampled($image, $watermark, $left, $top, 0, 0, $watermark_width, $watermark_height, $watermark_width, $watermark_height);
imagejpeg($image,"new.jpg",1000);

####

?>