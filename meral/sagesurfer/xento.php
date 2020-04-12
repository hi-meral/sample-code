
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Select test</title>
        <style>
        .mdiv{ width:30px; border:1px solid red; float:left; text-align:center; }
        </style>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			// For clear all the controls of form
			var m = new Array();
			var n = 0;
		
			n = 0;
			
			$(document).ready(function(){

				
				setInterval("callme()",3000);
				
				
			});
			
			function callme()
			{
				var dt = Math.floor(Math.random() * 10);
				m[n] = dt;
				
				if(dt!=m[n-1])
				{
				
					$('#num').html(dt);
					$('#s').append('<div class="mdiv">'+dt+'</div>');
					
					
					var p = n-2;
					
					if(dt==m[p])
						$('#j').append('<div class="mdiv">Y</div>');
					else
						$('#j').append('<div class="mdiv">N</div>');
						
					
	
					n++;
				}
				//setTimeout($('#num').html(''),2000);
			}
			
			
			$(document).keypress(function(event){
				var x= String.fromCharCode(event.which); 
				
				$('#k').append('<div class="mdiv">'+x+'</div>');
			 })
			//alert(Math.floor(Math.random() * 10));
		</script>
	</head>
	<body>
		
<br />
<br />
<br />
<div style="font-size:20px;" id="num"></div>
<br />
<br />
<br />
<div style="font-size:20px;" id="s"></div>
<br />
<br />
<br />
<div style="font-size:20px;" id="j"></div>
<br />
<br />

<div style="font-size:20px;" id="k" style="width:100%;"></div>

</body>
</html>
