
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Select test</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			// For clear all the controls of form
			
			$(document).ready(function(){
				
					$(".clearButton").click(function(){
						$(".clear").find(':input').each(function() {
							switch(this.type) {
							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':   
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
							case 'radio':
								this.checked = false;
							}
						});
					})
			});
			
		</script>
	</head>
	<body>
		<form action="" name="frm" id="frm" class="clear" >
		<input type="button" name="xxx" id="yyy" value="Press" class="clearButton" />
		
		
		<input type="text" name="ttt" id="ttt" style="background-color:#0F0; width:100px;" />
		<input type="radio" name="r" id="r" />
		<input type="checkbox" name="c" id="c" />
		<select class="styled">
				<option value="">sdfsds</option>
							<option value="Apparel">Apparel</option>
							<option value="Carts">Carts</option>
							<option value="Casing">Casing</option>
						</select>
		</form>
	</body>
</html>
