<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="./js/jquery2.0.3.min.js" ></script>
<script src="./js/jquery.validate.js" ></script>
<script>

$(document).ready(function(){
	
		$("#membersDiv").load('ajax.php',function(e){ 
		//$('#membersDiv').html(e);	
		
		$("#frmAddContact").validate({
				errorLabelContainer: '#error',
				rules: {
						txtFName: "required",
						txtLName: "required", 
						selRole: "required",
						txtEmail: {
							required: true,
							email: true
						},
						txtHPhone: { 
							minlength: 10,
							match:"number"
						},
						txtWPhone: { 
							minlength: 10,
							match:"number"
						},
						txtMobile: { 
							minlength: 10,
							match:"number"
						}
						
				},
				errorPlacement: function(error, element) {
					if (element.attr("name") == "chkAccept" ) {
						error.insertAfter("#errorDiv");
					} else {
						error.insertAfter(element);
					}
				},
				messages: {
						selRole: "Please select Role",
						txtFName: "Please enter your firstname",
						txtLName: "Please enter your lastname",
						txtEmail: "Please enter a valid email address",
						txtWPhone: {
							minlength: "Your work phone must be at least 10 digits",
						},
							txtHPhone: {
							minlength: "Your home phone must be at least 10 digits"
						},
							txtMobile: {
							minlength: "Your mobile must be at least 10 digits"
						}
				},
				success: function(element) {
						if($('#errors').css('display') == 'none') {
							$("button[type=submit]").removeAttr("disabled");
						} else {
							//$("button[type=submit]").attr("disabled", "disabled");
						}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		
		
		$('#save').click(function(){
								  alert(123);
			$('#frmAddContact').valid();						  
		});
		
		});
});

</script>
</head>

<body class="oneColElsCtr">
<div id="membersDiv">



</div>

</body>
</html>
