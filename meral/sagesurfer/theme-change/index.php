<?php

if(!isset( $_COOKIE["mycss"] ))
setcookie("mycss", "test", time()+3600);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo $_COOKIE["mycss"]; ?>.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<script>
jQuery(document).ready(function(){
	jQuery("#change").click(function(){
		jQuery('head').html('<link rel="stylesheet" href="green.css" type="text/css" />');
		document.cookie="mycss=green";
	});
	
	jQuery("#change1").click(function(){
		jQuery('head').html('<link rel="stylesheet" href="test.css" type="text/css" />');
		document.cookie="mycss=test";
	});
	
});
</script>
<body>
<div class="bcolor">
<a href="javascript:void(0)" id="change">green</a><br /><br />
<a href="javascript:void(0)" id="change1">red</a>
</div>
</body>
</html>
