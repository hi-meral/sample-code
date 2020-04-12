<?php

session_start();

$_SESSION['color'] = '#FF0000';

$GLOBALS['A'] = '#FF0000';
//echo "<pre/>";
//print_r($GLOBALS['A']);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="style.php"/>
<head>
<body>	
	<span id="test">test</span>
</body>
</html>
