<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"                     "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="jquery.validate.js"></script>
<style type="text/css">
* { font-family: Verdana; font-size: 96%; }
label { width: 10em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>
  <script>
  i=1;
  $(document).ready(function(){

		$("#commentForm").validate();
		$("#myform").validate();
  });
  </script>
  
</head>
<body>
  
<form id="commentForm" action="" method="post">
<p>
  
    <select name="month" class="required ">
        <option value="" >month</option>
    </select>
    <select name="day" class="required ">
               <option value="" >day</option>
    </select>
    <select name="year" class="required ">
               <option value="" >year</option>
    </select>
</p>
<input type="submit" value="Sign Up" class="button">
</form>​

 <form id="myform" method="post" action="">

 <select name="meral" class="required "  >
	<option value="" >meral</option>
	</select>
	<select name="sagar" class="required "  >
	<option value="" >sagar</option>
	</select>
    
<input type="submit" value="Sign Up" class="button">

 </form>
</body>
</html>