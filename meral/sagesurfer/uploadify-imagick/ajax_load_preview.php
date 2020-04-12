<?php
error_reporting(E_ALL);
//echo "<pre>";
//print_r(get_loaded_extensions());

//$im = new Imagick('mytest.pdf[0]');


//echo "<pre>";
//print_r(get_class_methods($imagick));


/*
if($_POST['action']=="load_preview_attach")
{
	$file_extension = pathinfo($_POST['filename']);

	echo $file_extension['extension'];
	if($file_extension['extension']=='pdf')
	{


		

		$imagick->readimage("/uploads/".$_POST['filename']);
	
		$imagick->writeimage("vaibhav.jpg");

	}
}
*/

//$imagick->readimage("individual_tab.pdf[0]");


//header('Content-Type: image/jpeg');
//$imagick->writeimage("vibhu.jpg");

# working code #
#echo $_POST["filename"];


 $im = new Imagick('uploads/'.$_POST["filename"].'[0]');
 $im->setImageFormat('jpg');
# header('Content-Type: image/jpeg');
# echo $im;
file_put_contents ('uploads/'.$_POST["filename"].".jpg", $im); // works, or:


/*
$im = new Imagick ();
$im->newImage (300, 225, "blue");

//instead
$im->setImageFormat ("jpg");
file_put_contents ("test_1.jpg", $im); // works, or:
//$im->imageWriteFile (fopen ("test_2.jpg", "wb")); //also works
 */
?>