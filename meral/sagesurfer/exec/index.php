<?php



$ffmpeg = ".\FFmpegTool\bin\\ffmpeg";
$destinationFile = "1.mov";
$convertedFile = "converted_vids/2.mp4"; 


if(file_exists($destinationFile)){
    

	//$cmd = $ffmpeg." -i  ".$destinationFile." -vcodec mpeg4 -r 30 -b 345k -acodec libmp3lame -ab 126000 -ar 44100 -ac 2 -s 320x240 ".$convertedFile;
	$cmd = $ffmpeg." -i  ".$destinationFile."   -strict -2 -pix_fmt yuv420p ".$convertedFile;
    exec(escapeshellcmd($cmd), $output); 
 	echo "executed command: => [".$cmd."] <br />with result: => ".print_r($output, true)."<br><br /><br />";
    echo "<h1>Successfully video Converted</h1>";
	
 }
/* else{
    echo "There is some problem during converting!";exit;
} */