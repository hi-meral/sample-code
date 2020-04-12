
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Select test</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.number.js"></script>
		<script type="text/javascript" src="jqprint.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			// For clear all the controls of form
			
			$(document).ready(function(){
				$('.chk_files').click(function() {
							
							if($('.chk_files').length==$('.chk_files:checked').length)
							{
								$('#selectall').prop('checked', true);
							}else{
								$('#selectall').prop('checked', false);	
							}
				});
					
			});
			
		var x = 119770;
		alert(addCommas(x));
		
		function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
		</script>
	</head>
	<body>
	
                    <input type="checkbox" name="checkbox0" value="1608" class="hereone chk_files">
                 
                    <input type="checkbox" name="checkbox1" value="1609" class="hereone chk_files">
                 
                    <input type="checkbox" name="checkbox2" value="1610" class="hereone chk_files">
					
					
                  <span id="e">34478574849</span>
<br />
<br />
<br />
<input type="checkbox" id="selectall" value="1" >
              
              
              
              	</body>
</html>
