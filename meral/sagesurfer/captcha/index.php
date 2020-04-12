<?php
session_start();

if(isset($_REQUEST["captcha"])) {
	if(($_REQUEST["captcha"]==$_SESSION['captcha_code']))
	{
		echo "TRUE";
	}
	else
	{
		echo "FALSE";
	}
	exit;
}

$_SESSION['captcha'] = array();

include("simple-php-captcha.php");

$_SESSION['captcha'] = simple_php_captcha();

$_SESSION["captcha_code"] = $_SESSION['captcha']["code"];
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Example &raquo; A simple PHP CAPTCHA script</title>
    <style type="text/css">
        pre {
            border: solid 1px #bbb;
            padding: 10px;
            margin: 2em;
        }

        img {
            border: solid 1px #ccc;
            margin: 0 2em;
        }
    </style>
</head>
<body>


<form action="index.php" method="post"> 
    <p>
        <?php
        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';

        ?>
    </p>
	<p>
		<input type="text" name="captcha" value=""   />
	</p>
	
	<p>
		<input type="submit" name="sub1" id="sub1" value="Submit"   />
	</p>
</form>
</body>
</html>
