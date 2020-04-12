<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="../hcare/js/jquery.validate.js" language="javascript"></script> 
<script language="javascript">

jQuery("#addFileDocman").validate({
							errorLabelContainer: '#errors',
								rules: {
									
									'description' : { maxlength: 50},
									'comment': { required: true , maxlength: 50},
									'file': {
									  required: true,
									  extension: "xls|csv|doc|docx"
									}
							},
							messages: {
								
								

								'description' : { maxlength: "Description Should not be more than 50 characters" },
								'comment': { required: "Comment is mandatory!" , maxlength: "Comment Should not be more than 50 characters" },
								'file': {
									  required: "Please Select a file",
									  extension: "This file type is not acceptable"
								}
							},
							submitHandler: function(form) {
								//process
								form.submit();
							}
						});//End validate
						
</script>