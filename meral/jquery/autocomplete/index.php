<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>j</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="javascript/jquery.js"></script>
  <script type="text/javascript" src="javascript/jquery.autocomplete.js"></script>
	<link rel="stylesheet" href="css/jquery.autocomplete.css" type="text/css" />
	
</head>
<body>

<form onsubmit="return false;" action="">
	<p>
		
		<input type="text" style="width: 200px;" value="" id="CityAjax" class="ac_input"/><br><br><br>
		<input type="text" style="width: 200px;" value="" id="CityAjax2" class="ac_input"/>
	</p>
</form>

<script type="text/javascript">
 
  
  
    $("#CityAjax").autocomplete(
      "autocomplete.php",
      {
  			delay:10,
  			minChars:2,
  			matchSubset:1,
  			matchContains:1,
  			cacheLength:10,
  			
  			
  			
  			autoFill:true
  		}
    );
	
	  $("#CityAjax2").autocomplete(
      "autocomplete.php",
      {
  			delay:10,
  			minChars:2,
  			matchSubset:1,
  			matchContains:1,
  			cacheLength:10,
  			
  			
  			
  			autoFill:true
  		}
    );
  
</script>
</body>
</html>