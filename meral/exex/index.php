<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.10.2.js.js" type="application/javascript" ></script>
<title>Untitled Document</title>

<script language="javascript">

	$(document).ready(setInterval(callnext,2000));
	
	
	function callnext(){
		$.ajax({
			url : 'ajax.php',
			data : 'a=1',
			type : 'get',
			success : function(data){
				$('#mdiv').html(data);
			}
		});
	}
</script>
<style type="text/css">
	#mdiv { width:100px; height:70px; border:5px solid green; text-align:center; font-size:36px; padding-top:15px; font-family:Verdana, Geneva, sans-serif; color:red; }
</style>
</head>

<body>
    <center>
        <div id="mdiv"></div>
        <input type="button" name="yes" id="yes" value="Yes"  />
        <input type="button" name="no" id="no" value="No"  />
    </center>
</body>
</html>
