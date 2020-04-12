<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<?php header('X-FRAME-OPTIONS: SAMEORIGIN');?>
<html>
<head>
<title>Page Title</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
</head>
<body>


<script> 
jQuery(document).ready(function()
{
    jQuery.get('test.php',{id:1},function(data)
	{
		   if(data)
		   {
				$('#site').contents().find("body").html( data);
		   } 
		   else 
		   {
				alert('Something went wrong please try again');
		   }
	});
});

</script>


<iframe src="https://hcare.sagesurfer.com/" id="site" width="60%" height="100%"></iframe>

</body>
</html>